<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class GetInTouch extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // public $timestamps = true;
    protected $table = 'get_in_touch';

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'phone',
        'company',
        'url',
        'email',
        'message',
    ];

}
