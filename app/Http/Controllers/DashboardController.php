<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tz = 'Asia/Jakarta';
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
        $dt->setTimestamp($timestamp); //adjust the object to correct timestamp

        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = $dt->format('H');

        if ($time >= "5" && $time < "12" ) {
            $greetings = "Good morning";
        } else

        if ($time >= "12" && $time < "18") {
            $greetings = "Good afternoon";
        } else

        if ($time >= "18" or $time < "5") {
            $greetings = "Good evening";
        }

        return view('dashboard', compact('greetings'));
    }
}
