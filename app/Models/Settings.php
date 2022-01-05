<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'search',
        'restorant_details_image',
        'restorant_details_cover_image',
        'description',
        'header_title',
        'header_subtitle',
        'currency',
        'facebook',
        'instagram',
        'playstore',
        'appstore',
        'maps_api_key',
        'delivery',
        'typeform',
        'mobile_info_title',
        'mobile_info_subtitle',
        'order_options',
        'site_logo_dark',
        'order_fields',
    ];
}
