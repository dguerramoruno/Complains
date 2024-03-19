<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    public static function getAllStatus()
    {
        return self::all(); // Puedes ajustar esto según tus necesidades
    }
}
