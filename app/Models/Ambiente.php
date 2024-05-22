<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;
    protected $table = 'ambientes';
    protected $fillable = ['num_ambiente', 'capacidad', 'ubicacion', 'facultad', 'estado'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    // Mutador para el campo 'name'
    public function setNameAttribute($value)
    {
        $this->attributes['num_ambiente'] = trim($value);
    }
}
