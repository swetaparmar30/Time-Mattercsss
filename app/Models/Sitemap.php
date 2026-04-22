<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sitemap extends Model
{
    use HasFactory,SoftDeletes;

     public $timestamps = true;

     public $table = 'sitemaps';

     protected $fillable = [
        'type',
        'html_sitemap',
        'html_short_by',
        'html_show_date',
        'post_include_h_sitemap',
        'post_include_sitemap',
        'post_exclude',
        'c_include_sitemap',
        'c_include_html_sitemap',
        'c_include_empty_terms',
        'p_include_sitemap',
        'p_include_html_sitemap',
        'select_page',
        'select_posts',
        'r_select_page',
        'c_select_page'
     ];
}
