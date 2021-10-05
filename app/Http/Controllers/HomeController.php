<?php

namespace App\Http\Controllers;

use App\Parking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todayCheckinis = Parking::whereDate('checkin', Carbon::today())->get();
        $todaysCheckin = $todayCheckinis->count();

        $todayCheckouts = Parking::whereDate('checkout', Carbon::today())->get();
        $todaysCheckout = $todayCheckouts->count();



        $todayCheckouts = Parking::select('amount')
            ->where('date', date('Y-m-d'))
            ->where('checkout', '!=', null)
            ->where('checkin', '!=', null)
            ->get();
        $todaysTotal = $todayCheckouts->sum('amount');


        // $todaysCheckout = 0;
        // $todaysCheckin = 0;
        // $noOFCheckinsToday = 0;

        // dd($todayCheckinis);
        return view('home', compact(
            'todaysCheckout',
            'todaysCheckin',
            'todaysTotal'
        ));
    }
}
