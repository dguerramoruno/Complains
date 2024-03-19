<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

/**
 * Class Denuncia
 *
 * @property $id
 * @property $intern
 * @property $estado
 * @property $observaciones
 * @property $type
 * @property $descripcio
 * @property $archivo
 * @property $testigos
 * @property $updated
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Denuncia extends Model
{
    
    static $rules = [
		'intern' => 'required',
		'estado' => 'required',
		'observaciones' => 'required',
		'type' => 'required',
		'descripcio' => 'required',
		'testigos' => 'required',
		'updated' => 'required',
    ];

    protected $perPage = 20;
    public $incrementing = false; 

    protected $keyType = 'string'; 

    protected $primaryKey = 'id';

    protected static function booted()
    {
        static::creating(function ($denuncia) {
            // Convertimos la fecha a cadena y luego la encriptamos
            $updated = now();
            $updated = Crypt::encrypt(now()->toDateTimeString());
            $denuncia->updated = $updated;
            $denuncia->updated = $updated;
        });

        static::updating(function ($denuncia) {
            // Convertimos la fecha a cadena y luego la encriptamos
            $updated = Crypt::encrypt(now()->toDateTimeString());
            $denuncia->updated = $updated;
        });

        static::retrieved(function ($denuncia) {
            // Desencriptamos y convertimos la fecha de nuevo a objeto DateTime
            try {
              $denuncia->updated = Crypt::decrypt($denuncia->updated);
          } catch (\Exception $e) {
              // Manejar la excepción, por ejemplo, registrarla o lanzarla nuevamente
              // dependiendo de tus requisitos.
              Log::error('Error al descifrar el campo "updated": ' . $e->getMessage());
          }
          });
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','intern','estado','observaciones','type','descripcio','archivo','testigos','updated'];



}
