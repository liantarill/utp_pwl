<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;  // UUID bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'medical_record_number',
        'name',
        'identity_number',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'blood_type',
        'allergies',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
            if (!$model->medical_record_number) {
                $model->medical_record_number = 'MRN-' . Str::upper(Str::random(6));
            }
        });
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
