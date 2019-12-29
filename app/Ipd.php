<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ipd extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'ipds';

    protected $dates = [
        'date_admit',
        'created_at',
        'updated_at',
        'deleted_at',
        'date_start_sick',
        'date_discharged',
    ];

    const AGE_RANGE_SELECT = [
        '15 - 24ឆ្នាំ' => '15 - 24ឆ្នាំ (4)',
        '25 - 49ឆ្នាំ' => '25 - 49ឆ្នាំ (5)',
        '50 - 64ឆ្នាំ' => '50 - 64ឆ្នាំ (6)',
        '≥65ឆ្នាំ'     => '≥65ឆ្នាំ (7)',
    ];

    const PAYMENT_TYPE_SELECT = [
        'Payant'   => 'បង់ប្រាក់',
        'Credit'   => 'ជំពាក់',
        'Gratuit'  => 'លើកលែង',
        'Indigent' => 'ក្រីក្រ',
        'NFSS'     => 'បសស',
        'HEF'      => 'មូលនិធិសមធម៌',
    ];

    const DISCHARGED_FORM_SELECT = [
        'អនុញ្ញាត'    => 'អនុញ្ញាត (19)',
        'មិនអនុញ្ញាត' => 'មិនអនុញ្ញាត (20)',
        'បញ្ជូន'      => 'បញ្ជូន (21)',
        'ស្លាប់'      => 'ស្លាប់ (22)',
    ];

    protected $fillable = [
        'note',
        'guardian',
        'day_stay',
        'age_range',
        'patient_id',
        'updated_at',
        'created_at',
        'creator_id',
        'cause_dead',
        'deleted_at',
        'date_admit',
        'paraclinic',
        'diag_admit',
        'mother_dead',
        'payment_type',
        'department_id',
        'transfer_from',
        'diag_discharged',
        'date_discharged',
        'date_start_sick',
        'discharged_form',
        'discharged_condition',
        'transfer_to_department',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getDateStartSickAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateStartSickAttribute($value)
    {
        $this->attributes['date_start_sick'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateAdmitAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateAdmitAttribute($value)
    {
        $this->attributes['date_admit'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateDischargedAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateDischargedAttribute($value)
    {
        $this->attributes['date_discharged'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
