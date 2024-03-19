<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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
        'type' => 'required',
        'descripcio' => 'required',
        'testigos' => 'required',
    ];

    public $incrementing = false;

    protected $perPage = 20;
    protected $dates = ['fecha_creacion_encriptada', 'fecha_edicion_encriptada'];

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
            $denuncia->updated = Crypt::decrypt($denuncia->updated);
        });
    }
    public static function generarIdAleatorio()
    {
        return bin2hex(random_bytes(8)); // Valor aleatorio de 8 bytes convertido a hexadecimal
    }

    // Sobreescribir el método save para asignar el ID aleatorio antes de guardar
    public function save(array $options = [])
    {
        $this->id = self::generarIdAleatorio();
        parent::save($options);
    }

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','intern', 'type', 'descripcio', 'archivo', 'testigos', 'observaciones', 'estado','traspased'];

}