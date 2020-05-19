<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function favourites(){
        return $this->belongsToMany(Question::class,'favourite');
    }

    public function voteQuestions(){
        return $this->morphedByMany(Question::class,'votable');
    }
    public function voteReplies(){
        return $this->morphedByMany(Reply::class,'votable');
    }


    public function _vote($relationship ,$modal,$vote){
        if ($relationship->where('votable_id',$modal->id)->exists()){
            $relationship->updateExistingPivot($modal,['vote'=>$vote]);
        }else{
            $relationship->attach($modal,['vote'=>$vote]);
        }
    }

    public function voteTheQuestion(Question $question, $vote){
     $voteQuest = $this->voteQuestions();
       $this->_vote($voteQuest,$question,$vote);

    }


    public function voteTheReply(Reply $reply, $vote){
        $voteReply = $this->voteReplies();
        $this->_vote($voteReply,$reply,$vote);
    }
}
