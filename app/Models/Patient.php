<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'first_name', 'last_name', 'admit_date', 'discharge_date', 'contact_number'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
