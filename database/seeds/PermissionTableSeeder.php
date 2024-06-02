<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-create',
            'user-edit',
            'user-delete',
            'user-list',


            'imggallery-list', 'imggallery-create', 'imggallery-edit', 'imggallery-delete',
            'managingcommittee-list', 'managingcommittee-create', 'managingcommittee-edit', 'managingcommittee-delete',

            'noticeboard-list', 'noticeboard-create', 'noticeboard-edit', 'noticeboard-delete',

            'teachingstaff-list', 'teachingstaff-create', 'teachingstaff-edit', 'teachingstaff-delete',

            'contact-list', 'contact-create', 'contact-edit', 'contact-delete',
            'history-list', 'history-create', 'history-edit', 'history-delete',
            'weoffer-list', 'weoffer-create', 'weoffer-edit', 'weoffer-delete',
            'vission-list', 'vission-create', 'vission-edit', 'vission-delete',
            'location-list', 'location-create', 'location-edit', 'location-delete',
            'websitesetting-list', 'websitesetting-create', 'websitesetting-edit', 'websitesetting-delete',
            'chairmenmessage-list', 'chairmenmessage-create', 'chairmenmessage-edit', 'chairmenmessage-delete',
            'homebannerimage-list', 'homebannerimage-create', 'homebannerimage-edit', 'homebannerimage-delete',
            'usefulllinks-list', 'usefulllinks-create', 'usefulllinks-edit', 'usefulllinks-delete',
            'resultinfo-list', 'resultinfo-create', 'resultinfo-edit', 'resultinfo-delete',
            'homepageinfo-list', 'homepageinfo-create', 'homepageinfo-edit', 'homepageinfo-delete',

            'academiccategory-list', 'academiccategory-create', 'academiccategory-edit', 'academiccategory-delete',
            'academicnotice-list', 'academicnotice-create', 'academicnotice-edit', 'academicnotice-delete',
            'gallerycategories-list', 'gallerycategories-create', 'gallerycategories-edit', 'gallerycategories-delete',
            'facility-list', 'facility-create', 'facility-edit', 'facility-delete',
            'facilitycategories-list', 'facilitycategories-create', 'facilitycategories-edit', 'facilitycategories-delete',
            'admissioncategory-list', 'admissioncategory-create', 'admissioncategory-edit', 'admissioncategory-delete',
            'admissionnotice-list', 'admissionnotice-create', 'admissionnotice-edit', 'admissionnotice-delete',
            'latestinfo-list', 'latestinfo-create', 'latestinfo-edit', 'latestinfo-delete',
            'studentinfo-list', 'studentinfo-create', 'studentinfo-edit', 'studentinfo-delete',
            'parentsfeedback-list', 'parentsfeedback-create', 'parentsfeedback-edit', 'parentsfeedback-delete'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
