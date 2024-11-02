<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['doctor_id', 'first_name', 'last_name', 'admit_date', 'discharge_date', 'contact_number'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
