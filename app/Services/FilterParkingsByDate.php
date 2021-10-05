<?php

namespace App\Services;


class FilterParkingsByDate
{

    public function filterByDate($query, $from, $to)
    {
        $query->whereBetween('created_at', [date('Y-m-d 00:00:00', strtotime($from)), date('Y-m-d  23:59:59', strtotime($to))]);
        return $query;
    }
}
