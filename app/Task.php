<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Listask;


class Task extends Model
{
    protected $fillable = ['name', 'description'];

    protected $table = "tasks";

    /**
     * Obtenir l'utilisateur à qui appartient la tâche courante
     */

    public function user()
    {
        //return $this->belongsTo(User::class);
        return $this->belongsTo('App\User');
    }

    public function listasks()
    {
        //return $this->hasMany(Listask::class);
        return $this->hasMany('App\Listask');
    }


}
