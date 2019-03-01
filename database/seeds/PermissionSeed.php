<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'message_access',],
            ['id' => 18, 'title' => 'message_create',],
            ['id' => 19, 'title' => 'message_edit',],
            ['id' => 20, 'title' => 'message_view',],
            ['id' => 21, 'title' => 'message_delete',],
            ['id' => 22, 'title' => 'status_access',],
            ['id' => 23, 'title' => 'status_create',],
            ['id' => 24, 'title' => 'status_edit',],
            ['id' => 25, 'title' => 'status_view',],
            ['id' => 26, 'title' => 'status_delete',],
            ['id' => 27, 'title' => 'budget_access',],
            ['id' => 28, 'title' => 'budget_create',],
            ['id' => 29, 'title' => 'budget_edit',],
            ['id' => 30, 'title' => 'budget_view',],
            ['id' => 31, 'title' => 'budget_delete',],
            ['id' => 32, 'title' => 'category_access',],
            ['id' => 33, 'title' => 'category_create',],
            ['id' => 34, 'title' => 'category_edit',],
            ['id' => 35, 'title' => 'category_view',],
            ['id' => 36, 'title' => 'category_delete',],
            ['id' => 37, 'title' => 'contingency_access',],
            ['id' => 38, 'title' => 'contingency_create',],
            ['id' => 39, 'title' => 'contingency_edit',],
            ['id' => 40, 'title' => 'contingency_view',],
            ['id' => 41, 'title' => 'contingency_delete',],
            ['id' => 42, 'title' => 'expense_type_access',],
            ['id' => 43, 'title' => 'expense_type_create',],
            ['id' => 44, 'title' => 'expense_type_edit',],
            ['id' => 45, 'title' => 'expense_type_view',],
            ['id' => 46, 'title' => 'expense_type_delete',],
            ['id' => 47, 'title' => 'invoice_access',],
            ['id' => 48, 'title' => 'invoice_create',],
            ['id' => 49, 'title' => 'invoice_edit',],
            ['id' => 50, 'title' => 'invoice_view',],
            ['id' => 51, 'title' => 'invoice_delete',],
            ['id' => 52, 'title' => 'medium_access',],
            ['id' => 53, 'title' => 'medium_create',],
            ['id' => 54, 'title' => 'medium_edit',],
            ['id' => 55, 'title' => 'medium_view',],
            ['id' => 56, 'title' => 'medium_delete',],
            ['id' => 57, 'title' => 'meeting_access',],
            ['id' => 58, 'title' => 'meeting_create',],
            ['id' => 59, 'title' => 'meeting_edit',],
            ['id' => 60, 'title' => 'meeting_view',],
            ['id' => 61, 'title' => 'meeting_delete',],
            ['id' => 62, 'title' => 'project_access',],
            ['id' => 63, 'title' => 'project_create',],
            ['id' => 64, 'title' => 'project_edit',],
            ['id' => 65, 'title' => 'project_view',],
            ['id' => 66, 'title' => 'project_delete',],
            ['id' => 67, 'title' => 'provider_access',],
            ['id' => 68, 'title' => 'provider_create',],
            ['id' => 69, 'title' => 'provider_edit',],
            ['id' => 70, 'title' => 'provider_view',],
            ['id' => 71, 'title' => 'provider_delete',],
            ['id' => 72, 'title' => 'service_type_access',],
            ['id' => 73, 'title' => 'service_type_create',],
            ['id' => 74, 'title' => 'service_type_edit',],
            ['id' => 75, 'title' => 'service_type_view',],
            ['id' => 76, 'title' => 'service_type_delete',],
            ['id' => 77, 'title' => 'year_access',],
            ['id' => 78, 'title' => 'year_create',],
            ['id' => 79, 'title' => 'year_edit',],
            ['id' => 80, 'title' => 'year_view',],
            ['id' => 81, 'title' => 'year_delete',],
            ['id' => 82, 'title' => 'invoice_management_access',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
