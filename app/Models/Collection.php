<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Cviebrock\EloquentSluggable\Sluggable;

class Collection extends Model
{
    use HasFactory, SoftDeletes, Userstamps, Sluggable;

         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public $timestamps = true;
     protected $userstamps = [
        'created_by' => 'created_by', 
        'updated_by' => 'updated_by',
        'deleted_by' => 'deleted_by',
    ];

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'type',
        'title',
        'slug',
        'sub_title',
        'short_description',
        'button_name',
        'button_url'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

}
