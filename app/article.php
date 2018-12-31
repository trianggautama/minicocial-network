<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class article extends Model
{
protected $fillable=[
  'users_id','content','live','post_on'
];
public function getname(){
    return $this->belongsTo(User::class);
  }


protected $dates=['post_on'];
public function setLiveAttribute($value){
  $this->attributes['live'] =(boolean)($value);
}

public function getShortContentAttribute(){
  return substr($this->content,0, random_int(75,175))."...";
}
public function setPostOnAttribute($value)
{
  $this->attributes['post_on']=Carbon::parse($value);
}


}
