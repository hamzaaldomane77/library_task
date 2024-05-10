<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'age',
    ];

    public function books(){
        return $this->belongsToMany(Book::class);
    }
    

    public function reviews(){
        return $this->morphMany(Review::class,'reviewable');
    }
}
