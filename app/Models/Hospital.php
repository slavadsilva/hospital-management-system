<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class hospital extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'location', 'staff_count', 'logo'];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
