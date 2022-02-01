<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //doesnot follow convention
    // public function testRelation()
    // {
    //     return $this->belongsTo(User::class,'post_creator');
    // }

    public function sluggable(): array
    {
      return [
        'slug' => [
          'source' => 'title'
        ]
     ];
    } 
}
