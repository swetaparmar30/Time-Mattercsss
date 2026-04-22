<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Apisetting extends Model
{
    use HasFactory, SoftDeletes;
   
    public $table = 'apisettings';
    
    protected $fillable = [
        'custom_css',
        'is_updated'
    ];

}
