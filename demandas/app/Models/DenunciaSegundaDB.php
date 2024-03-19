<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Denuncia
 *
 * @property $id
 * @property $intern
 * @property $observaciones
 * @property $estado
 * @property $type
 * @property $descripcio
 * @property $archivo
 * @property $testigos
 * @property $fecha_creacion_encriptada
 * @property $fecha_edicion_encriptada
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DenunciaSegundaDB extends Model
{
    use HasFactory;
    protected $connection = "denunciasManager";
    protected $table ="denuncias";
    protected $fillable = ['id','intern', 'type', 'descripcio', 'archivo', 'testigos', 'observaciones', 'estado'];
}
