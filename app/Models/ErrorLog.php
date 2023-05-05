<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $table = 'error_logs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'controller',
        'mensaje',
        'parametros',
        'user_id',
        'estado'
    ];

    // relaciones
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
