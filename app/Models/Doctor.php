<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['hospital_id', 'first_name', 'last_name', 'contact_number', 'specialization'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
