<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['date'];
    protected $fillable = ['name','description','date','assignedTo'];

    public function student()
    {
        return $this->belongsTo('App\User', 'assignedTo');
    }
    public function professor()
    {
        return $this->belongsTo('App\User', 'assignedBy');
    }
}
