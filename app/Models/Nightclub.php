<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nightclub extends Model
{
    use HasFactory;

    // Nombre de la tabla en MySQL.
    protected $table='nightclubs';

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = ['name','salsa','bachata','kizomba','price', 'address', 'parking', 'details'];

    // Aquí ponemos los campos que no queremos que se devuelvan en las consultas.
    protected $hidden = ['created_at','updated_at'];

}
