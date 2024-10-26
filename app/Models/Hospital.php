<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'staff_count', 'logo'];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
