<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'department_create',
            ],
            [
                'id'    => '20',
                'title' => 'department_edit',
            ],
            [
                'id'    => '21',
                'title' => 'department_show',
            ],
            [
                'id'    => '22',
                'title' => 'department_delete',
            ],
            [
                'id'    => '23',
                'title' => 'department_access',
            ],
            [
                'id'    => '24',
                'title' => 'patient_create',
            ],
            [
                'id'    => '25',
                'title' => 'patient_edit',
            ],
            [
                'id'    => '26',
                'title' => 'patient_show',
            ],
            [
                'id'    => '27',
                'title' => 'patient_delete',
            ],
            [
                'id'    => '28',
                'title' => 'patient_access',
            ],
            [
                'id'    => '29',
                'title' => 'emergency_create',
            ],
            [
                'id'    => '30',
                'title' => 'emergency_edit',
            ],
            [
                'id'    => '31',
                'title' => 'emergency_show',
            ],
            [
                'id'    => '32',
                'title' => 'emergency_delete',
            ],
            [
                'id'    => '33',
                'title' => 'emergency_access',
            ],
            [
                'id'    => '34',
                'title' => 'ipd_create',
            ],
            [
                'id'    => '35',
                'title' => 'ipd_edit',
            ],
            [
                'id'    => '36',
                'title' => 'ipd_show',
            ],
            [
                'id'    => '37',
                'title' => 'ipd_delete',
            ],
            [
                'id'    => '38',
                'title' => 'ipd_access',
            ],
            [
                'id'    => '39',
                'title' => 'surgery_create',
            ],
            [
                'id'    => '40',
                'title' => 'surgery_edit',
            ],
            [
                'id'    => '41',
                'title' => 'surgery_show',
            ],
            [
                'id'    => '42',
                'title' => 'surgery_delete',
            ],
            [
                'id'    => '43',
                'title' => 'surgery_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
