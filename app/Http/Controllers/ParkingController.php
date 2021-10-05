<?php

namespace App\Http\Controllers;

use App\Parking;
use App\RateCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index()
    {
        $parkings = Parking::whereDate('date', Carbon::today())->latest()->paginate(10);

        // $handle = printer_open();

        // printer_close($handle);

        return view('parking.index', compact('parkings'));
    }
    public function checkin()
    {
        $parking = Parking::where('date', Carbon::today())->latest()->first();

        return view('parking.checkin', compact('parking'));
    }

    public function checkout($consignmentno)
    {
        return view('parking.checkout', $this->findDetails($consignmentno));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consignmentno' => 'required|unique:parkings,consignmentno',
            'vehicle_no' => 'required|string',
        ]);

        Parking::create([
            'consignmentno' => $request->consignmentno,
            'vehicle_no' => strtoupper($request->vehicle_no),
            'checkin' => now(),
            'user_id' => auth()->user()->id,
            'date' => Carbon::today(),
        ]);

        session()->flash('success', 'Checkin entry added successfully');

        return redirect()->route('parking.checkin');
    }

    public function update(Request $request)
    {
        $parking = Parking::where('consignmentno', $request->consignmentno)->firstOrFail();

        $parking->update([
            'checkout' => $request->current_time,
            'amount' => $request->amount,
            'hours' => $request->hours,
        ]);

        session()->flash('success', 'Checkout successfully done');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        return view('parking.checkout', $this->findDetails($request->consignmentno));
    }

    public function printCheckinReceipt($consignmentno)
    {
        $parking = Parking::where('consignmentno', $consignmentno)->firstOrFail();
        return view('print.checkin', compact('parking'));
    }

    public function printCheckoutReceipt($consignmentno)
    {
        return view('print.checkout', $this->findDetails($consignmentno));
    }

    private function findDetails($consignmentno)
    {
        $parking = Parking::where('consignmentno', $consignmentno)->firstOrFail();

        $checkout_time = now();
        $hours_spent = Carbon::parse($parking->checkin)->diffInHours($checkout_time);

        $checkinMinutes = Carbon::parse($parking->checkin)->minute;
        $checkoutMinutes = $checkout_time->minute;

        if ($checkoutMinutes > $checkinMinutes) $hours_spent++;

        $rate = RateCard::where('from', '<=', $hours_spent)
            ->where('to', '>=', $hours_spent)
            ->first();

        $amount = $rate->amount;


        return compact('parking', 'hours_spent', 'checkout_time', 'amount');
    }
}
