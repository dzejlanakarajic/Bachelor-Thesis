<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['user_id', 'topic_id'];

    public function hasTopic()
    {
        return $this->belongsTo('App\Topic', 'topic_id');
    }
}
