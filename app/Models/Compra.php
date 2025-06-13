<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'fecha', 'total', 'estado'];
    public $timestamps = false;

    protected $casts = [
        'fecha' => 'datetime',
    ];

    // Relación con CompraDetalle
    public function detalles()
    {
        return $this->hasMany(CompraDetalle::class, 'compra_id');
    }
}
