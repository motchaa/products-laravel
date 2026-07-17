<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'codigo',
        'valor',
        'quantidade',
        'ativo',
        'categoria_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    protected static function booted()
    {
        static::deleting(function ($produto) {
            $produto->ativo = 0;
            $produto->save();
        });
    }
}
