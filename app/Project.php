<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'name','thumbnail'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');//user 和 project 的关系是多对一,一个用户有多个项目
    }

    public function tasks(){
        return $this->hasMany('App\Task');    //tasks 和 Project 的关系是一对多, 一个项目可以有很多个任务
    }
}
