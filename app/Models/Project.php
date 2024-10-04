<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    protected $fillable = ['type_id', 'title', 'slug', 'text', 'path_image', 'image_original_name'];

}
