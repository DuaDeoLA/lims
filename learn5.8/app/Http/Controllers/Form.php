<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Form extends Controller
{
    //
    public function GetData(Request $request)
    {
        $urlWithQueryString = $request->fullUrl();
        echo $urlWithQueryString;
       // $header = $request->header('X-Header-Name');
       if ($request->hasHeader('X-Header-Name')) {
            echo  $request->header();
        } else{
            echo 'No header';
        }
        $ipAddress = $request->ip();
        echo '<br>';
        echo $ipAddress;
       
    }
}
