<?php

namespace App;
use App\User;

trait VootableTrait{


public function votes(){
    return $this->morphToMany(User::class,'votable');
}

public function downCount(){
    $this->load('votes');
    $up = $this->votes()->wherePivot('vote',-1)->count();
    return $up;
}
public function getDownAttribute(){
    return $this->downCount();
}

public function upCount(){
    $this->load('votes');
    $up = $this->votes()->wherePivot('vote',1)->count();
    return $up;
}
public function getUpAttribute(){
    return $this->upCount();
}

}