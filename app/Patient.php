<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'patients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const GENDER_SELECT = [
        '1' => 'ប្រុស',
        '2' => 'ស្រី',
    ];

    protected $fillable = [
        'hn',
        'nup',
        'age',
        'name',
        'phone',
        'gender',
        'name_kh',
        'address',
        'creator_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function patientEmergencies()
    {
        return $this->hasMany(Emergency::class, 'patient_id', 'id');
    }

    public function patientIpds()
    {
        return $this->hasMany(Ipd::class, 'patient_id', 'id');
    }

    public function patientSurgeries()
    {
        return $this->hasMany(Surgery::class, 'patient_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
