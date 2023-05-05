<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditarAccion extends Model
{
    protected $table = 'auditar_acciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre'
    ];

    // relaciones
    public function auditarDetalle(){
        return $this->hasMany('App\Model\AuditarDetalle', 'auditar_accion_id', 'id');
    }

    public function ejemplo(){
        return $this->hasMany('App\Model\Ejemplo', 'auditar_accion_id', 'id');
    }
}
