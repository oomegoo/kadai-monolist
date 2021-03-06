<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable = ['code', 'name', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    //Want のみの User 一覧を取得
    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
    //HaveしたUserの一覧を取得
    public function have_users()
    {
        return $this->users()->where('type','have');
    }
}
