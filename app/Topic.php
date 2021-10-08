<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'description', 'assignedTo'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    
    public function hasAuthor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function hasStudent()
    {
        return $this->belongsTo('App\User', 'assignedTo');
    }

}
