<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function get_result($mark){
        $result = get_result($mark);
        dd($result);
    }
}
