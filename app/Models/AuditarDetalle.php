<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditarDetalle extends Model
{
    protected $table = 'auditar_detalle';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'antes',
        'despues',
        'primary_key',
        'auditar_accion_id',
        'auditar_tabla_id'
    ];

    // relaciones
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function auditarAccion(){
        return $this->belongsTo('App\Models\AuditarAccion', 'auditar_accion_id', 'id');
    }

    public function auditarTabla(){
        return $this->belongsTo('App\Models\AuditarTabla', 'auditar_tabla_id', 'id');
    }

}
