<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarefa extends Model
{
    use SoftDeletes;
    protected $fillable = ['titulo', 'descricao', 'status'];
    protected $appends = ['data_criacao'];

    public function getDataCriacaoAttribute()
    {
        return $this->created_at ?  $this->created_at->timezone('America/Fortaleza')->format('d/m/Y') : null;
    }
}
