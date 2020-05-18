<?php

namespace App;

use App\Policies\QuestionPolicy;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

    protected $guarded = [];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
