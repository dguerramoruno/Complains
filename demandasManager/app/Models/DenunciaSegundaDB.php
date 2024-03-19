<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaSegundaDB extends Model
{
    use HasFactory;
    protected $connection = "denuncias";
    protected $table ="denuncias";
    protected $fillable = ['id','intern', 'type', 'descripcio', 'archivo', 'testigos', 'observaciones', 'estado'];
}

