<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'general_settings';

    // The attributes that are mass assignable.
    protected $fillable = [
        'site_name',
        'site_description',
        'meta_title',
        'meta_description',
        'contact_email',
        'phone_number',
        'contact_address',
        'header_logo',
        'footer_logo',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'status',
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [
        // Add any fields you want to hide if necessary.
    ];
}
