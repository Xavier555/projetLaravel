<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listask extends Model
{

    protected $fillable = ['name','description', 'validation', 'echeance'];

    protected $table = "listasks";

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
