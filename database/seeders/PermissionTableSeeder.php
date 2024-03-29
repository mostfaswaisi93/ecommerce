<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'الفواتير',
            'قائمة الفواتير',
            'الفواتير المدفوعة',
            'الفواتير المدفوعة جزئيًا',
            'الفواتير الغير مدفوعة',
            'أرشيف الفواتير',
            'التقارير',
            'تقرير الفواتير',
            'تقرير العملاء',
            'المستخدمين',
            'قائمة المستخدمين',
            'صلاحيات المستخدمين',
            'الإعدادات',
            'المنتجات',
            'الأقسام',

            'إضافة فاتورة',
            'حذف الفاتورة',
            'تصدير EXCEL',
            'تغيير حالة الدفع',
            'تعديل الفاتورة',
            'أرشفة الفاتورة',
            'طباعةالفاتورة',
            'إضافة مرفق',
            'حذف المرفق',
            'الإشعارات',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
