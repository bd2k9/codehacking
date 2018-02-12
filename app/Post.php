<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Photo;
use App\Category;

class Post extends Model
{
    
    protected $fillable = [

        'category_id', 'photo_id', 'title', 'body',

    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);

    }

}
