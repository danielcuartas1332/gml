<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'nombre', 'apellido','cedula','email','pais','direccion','celular'
    ];

    public static function allPosts(){
        $datos = self::select(
            DB::raw(
                "count(pais) as count,
                pais"
            ))
            ->groupBy('pais')
            ->get();

        return $datos;
    }
}
