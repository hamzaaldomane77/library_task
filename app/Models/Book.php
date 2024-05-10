<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
 
    protected $fillable=[
        'title',
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }


    public function reviews(){
        return $this->morphMany(Review::class,'reviewable');
    }
}
