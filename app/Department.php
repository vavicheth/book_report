<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'abr',
        'name',
        'abr_kh',
        'active',
        'name_kh',
        'bed_total',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function departmentEmergencies()
    {
        return $this->hasMany(Emergency::class, 'department_id', 'id');
    }

    public function departmentIpds()
    {
        return $this->hasMany(Ipd::class, 'department_id', 'id');
    }

    public function departmentSurgeries()
    {
        return $this->hasMany(Surgery::class, 'department_id', 'id');
    }

    public function departmentUsers()
    {
        return $this->hasMany(User::class, 'department_id', 'id');
    }
}
