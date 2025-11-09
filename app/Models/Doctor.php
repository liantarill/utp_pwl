<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

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
        'photo',
    ];
    protected $casts = [
        'str_expiry_date' => 'datetime',
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
