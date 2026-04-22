<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleCategory extends Model
{
    use HasFactory;

    protected $table = 'role_category';
    
    protected $fillable = ['name', 'title', 'description', 'image', 'button_url', 'status','button_text'];
}
