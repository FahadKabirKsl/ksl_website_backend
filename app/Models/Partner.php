<?php

namespace App\Models;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Union;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
}
