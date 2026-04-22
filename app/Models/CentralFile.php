<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CentralFile extends Model
{
    protected $table = 'central_files';

    protected $fillable = [
        'name',
        'file_path',
        'status',
        'created_by',
        'updated_by'
    ];

    public function roleCategories()
    {
        return $this->belongsToMany(RoleCategory::class, 'file_role_category', 'file_id', 'role_category_id');
    }
}
