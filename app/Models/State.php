<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    // ✅ Corrected Relation (Extra states() function remove kiya)
    public function sectionLocations()
    {
        return $this->belongsToMany(SectionLocation::class, 'section_location_states', 'state_id', 'section_location_id');
    }
}
