<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    //
    public static function getStatus(){
        $status = Status::pluck('nombre', 'id');
        return $status;
    }
}
