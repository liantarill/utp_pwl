<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doctors';
    public $incrementing = false;         // penting untuk UUID pk
    protected $keyType = 'string';        // id adalah string UUID
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'specialization_id',
        'license_number',
        'str_number',
        'str_expiry_date',
        'education',
        'experience_years',
        'consultation_fee',
        'bio',
        'photo'
    ];
    protected $casts = [
        'str_expiry_date' => 'date',
    ];

    // Relasi ke user (pastikan User model ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
    // Relasi ke jadwal
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
