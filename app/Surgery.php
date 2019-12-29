<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surgery extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'surgeries';

    protected $dates = [
        'date_admit',
        'created_at',
        'updated_at',
        'deleted_at',
        'date_surgery',
        'date_discharged',
    ];

    const PAYMENT_TYPE_SELECT = [
        'Payant'   => 'បង់ប្រាក់',
        'Credit'   => 'ជំពាក់',
        'Gratuit'  => 'លើកលែង',
        'Indigent' => 'ក្រីក្រ',
        'NFSS'     => 'បសស',
        'HEF'      => 'មូលនិធិសមធម៌',
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
        'paraclinic',
        'deleted_at',
        'cause_dead',
        'diag_admit',
        'date_admit',
        'mother_dead',
        'payment_type',
        'date_surgery',
        'department_id',
        'transfer_from',
        'discharged_form',
        'diag_discharged',
        'date_discharged',
        'discharged_condition',
        'transfer_to_department',
    ];

    const DISCHARGED_FORM_SELECT = [
        'អនុញ្ញាត'        => 'អនុញ្ញាត (22)',
        'មិនអនុញ្ញាត'     => 'មិនអនុញ្ញាត (23)',
        'បញ្ជូន'          => 'បញ្ជូន (24)',
        'ស្លាប់ < 48ម៉ោង' => 'ស្លាប់ < 48ម៉ោង (25)',
        'ស្លាប់ ≥ 48ម៉ោង' => 'ស្លាប់ ≥ 48ម៉ោង (26)',
    ];

    const AGE_RANGE_SELECT = [
        '0 - 28ថ្ងៃ'    => '0 - 28ថ្ងៃ (5)',
        '29ថ្ងៃ - 11ខែ' => '29ថ្ងៃ - 11ខែ (6)',
        '1 - 4ឆ្នាំ'    => '1 - 4ឆ្នាំ (7)',
        '5 -14ឆ្នាំ'    => '5 -14ឆ្នាំ (8)',
        '15 - 24ឆ្នាំ'  => '15 - 24ឆ្នាំ (9)',
        '25 - 49ឆ្នាំ'  => '25 - 49ឆ្នាំ (10)',
        '50 - 64ឆ្នាំ'  => '50 - 64ឆ្នាំ (11)',
        '≥65ឆ្នាំ'      => '≥65ឆ្នាំ (12)',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getDateAdmitAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateAdmitAttribute($value)
    {
        $this->attributes['date_admit'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateSurgeryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSurgeryAttribute($value)
    {
        $this->attributes['date_surgery'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
