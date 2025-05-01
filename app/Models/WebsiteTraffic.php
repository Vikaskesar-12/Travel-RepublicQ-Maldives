<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteTraffic extends Model
{
    use HasFactory;

    protected $table = 'website_traffic';
    protected $fillable = ['source', 'visitors'];
}
