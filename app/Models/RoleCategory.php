<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class RoleCategory extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'role_category';
    
    protected $fillable = ['name', 'title', 'description', 'image', 'button_url', 'status','button_text', 'slug'];

    public function roleCategories()
    {
        return $this->belongsToMany(CentralFile::class, 'file_role_category', 'role_category_id', 'file_id');
    }

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'title'], // ✅ merge both fields
            ]
        ];
    }
}
