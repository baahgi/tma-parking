<?php

namespace App\Http\Controllers;

use App\Parking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\FilterParkingsByDate;

class ReportController extends Controller
{
    public function daily()
    {
        $parkings = Parking::whereDate('date', Carbon::today())->latest()->get();

        return view('report.datewise', compact('parkings'));
    }

    public function monthly()
    {
        $parkings = Parking::whereMonth('date', Carbon::today()->month)->latest()->get();

        return view('report.datewise', compact('parkings'));
    }

    public function datewise(Request $request)
    {

        $query = Parking::select('consignmentno', 'vehicle_no', 'checkin', 'checkout', 'hours', 'amount', 'date')
            ->orderBy('id', 'desc');

        $query = $request->has('from') ?
            (new FilterParkingsByDate())->filterByDate($query, $request->from, $request->to) : (new FilterParkingsByDate())->filterByDate($query, date('Y-m-d 00:00:00'), date('Y-m-d 00:00:00'));

        $parkings = $query->get();

        return view('report.datewise', compact('parkings'));
    }
}
