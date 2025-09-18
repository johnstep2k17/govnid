<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class BackfillCitizenFieldsSeeder extends Seeder
{
    public function run(): void
    {
        $bloods = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];

        User::withTrashed()->get()->each(function ($u) use ($bloods) {
            if (!$u->national_id)       $u->national_id = 'NID-'.mt_rand(10000000, 99999999);
            if (!$u->address)           $u->address = '123 Sample St, Sample City, PH 1000';
            if (!$u->birthday)          $u->birthday = date('Y-m-d', mt_rand(strtotime('1970-01-01'), strtotime('2005-12-31')));
            if (!$u->phone)             $u->phone = '+63 9'.mt_rand(10,99).mt_rand(10000000, 99999999);
            if (!$u->blood_type)        $u->blood_type = $bloods[array_rand($bloods)];
            if (!$u->emergency_contact) $u->emergency_contact = 'Contact Person / +63 900 111 2222';
            $u->save();
        });
    }
}
