<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public static function dateDiff($start, $end=null)
    {
        $date1 = strtotime($start);
        if ($end) {
            $date2 = strtotime($end);
        } else {
            $date2 = strtotime(date('Y-m-d'));
        }

        if($start==null && $end==null){
            return 0;
        }

        return ($date2 - $date1) / 86400;
    }
}
