<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'razon_social_empresa',
        'sucursal_empresa',
        'logotipo_empresa',
        'numero_ruc_empresa',
        'direccion_empresa',
        'mapa_empresa',
        'numero_uno_empresa',
        'numero_dos_empresa',
        'numero_tres_empresa',
        'correo_empresa',
        'user_id'
    ];
}
