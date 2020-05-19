<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //
    use VootableTrait;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title']= $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute(){
        return route('question.show',$this->id);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public function favourites(){
        return $this->belongsToMany(User::class,'favourite');
    }
    public function isfavourited(){
        return $this->favourites()->where('user_id',auth()->id())->count()>0;
    }

    public function getFavouritedAttribute(){
        return $this->isfavourited();
    }



}
