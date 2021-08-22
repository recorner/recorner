<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'supportermanagement_access',
            ],
            [
                'id'    => 18,
                'title' => 'supporter_create',
            ],
            [
                'id'    => 19,
                'title' => 'supporter_edit',
            ],
            [
                'id'    => 20,
                'title' => 'supporter_show',
            ],
            [
                'id'    => 21,
                'title' => 'supporter_delete',
            ],
            [
                'id'    => 22,
                'title' => 'supporter_access',
            ],
            [
                'id'    => 23,
                'title' => 'upload_access',
            ],
            [
                'id'    => 24,
                'title' => 'slider_create',
            ],
            [
                'id'    => 25,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 26,
                'title' => 'slider_show',
            ],
            [
                'id'    => 27,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 28,
                'title' => 'slider_access',
            ],
            [
                'id'    => 29,
                'title' => 'audit_log_create',
            ],
            [
                'id'    => 30,
                'title' => 'audit_log_edit',
            ],
            [
                'id'    => 31,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 32,
                'title' => 'audit_log_delete',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 34,
                'title' => 'expens_management_access',
            ],
            [
                'id'    => 35,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 36,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 37,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 38,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 39,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 40,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 41,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 42,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 43,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 44,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 45,
                'title' => 'expense_create',
            ],
            [
                'id'    => 46,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 47,
                'title' => 'expense_show',
            ],
            [
                'id'    => 48,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 49,
                'title' => 'expense_access',
            ],
            [
                'id'    => 50,
                'title' => 'income_create',
            ],
            [
                'id'    => 51,
                'title' => 'income_edit',
            ],
            [
                'id'    => 52,
                'title' => 'income_show',
            ],
            [
                'id'    => 53,
                'title' => 'income_delete',
            ],
            [
                'id'    => 54,
                'title' => 'income_access',
            ],
            [
                'id'    => 55,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 56,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 57,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 58,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 59,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 60,
                'title' => 'contactmanagement_access',
            ],
            [
                'id'    => 61,
                'title' => 'company_create',
            ],
            [
                'id'    => 62,
                'title' => 'company_edit',
            ],
            [
                'id'    => 63,
                'title' => 'company_show',
            ],
            [
                'id'    => 64,
                'title' => 'company_delete',
            ],
            [
                'id'    => 65,
                'title' => 'company_access',
            ],
            [
                'id'    => 66,
                'title' => 'contact_create',
            ],
            [
                'id'    => 67,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 68,
                'title' => 'contact_show',
            ],
            [
                'id'    => 69,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 70,
                'title' => 'contact_access',
            ],
            [
                'id'    => 71,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 72,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 73,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 74,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 75,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 76,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 77,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 78,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 79,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 80,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 81,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 82,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 83,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 84,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 85,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 86,
                'title' => 'task_create',
            ],
            [
                'id'    => 87,
                'title' => 'task_edit',
            ],
            [
                'id'    => 88,
                'title' => 'task_show',
            ],
            [
                'id'    => 89,
                'title' => 'task_delete',
            ],
            [
                'id'    => 90,
                'title' => 'task_access',
            ],
            [
                'id'    => 91,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 92,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 93,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 94,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 95,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 96,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 97,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 98,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 99,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 100,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 101,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 102,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 103,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 104,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 105,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 106,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 107,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 108,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 109,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 110,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 111,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 112,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 113,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 114,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 115,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 116,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 117,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 118,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 119,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 120,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 121,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 122,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 123,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 124,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 125,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 126,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 127,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 128,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 129,
                'title' => 'asset_create',
            ],
            [
                'id'    => 130,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 131,
                'title' => 'asset_show',
            ],
            [
                'id'    => 132,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 133,
                'title' => 'asset_access',
            ],
            [
                'id'    => 134,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 135,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
