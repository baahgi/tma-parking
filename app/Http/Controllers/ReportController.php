<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function datewise()
    {
        return view('report.datewise');
    }
}
