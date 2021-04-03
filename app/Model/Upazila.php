<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function unions()
    {
        return $this->hasMany(Union::class);
    }
}
