<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            ['name' => 'Bernat Smith', 'slug' => Str::slug('Bernat Smith', '-'), 'birth_date' => '1912-10-10',
                'email' => 'bernat@email.com', 'phone' => 123456784,
                'country' => 'England', 'address' => 'Calle 123', 'job_contact' =>
                'yes', 'relation' => 'friend', 'user_id' => '3'],
            ['name' => 'Margalida Johnson', 'slug' => Str::slug('Margalida Johnson', '-'), 'birth_date' => '1912-10-10',
                'email;' => 'mjohnson@email.com', 'phone' =>
                987654321, 'country' => 'Spain', 'address' => 'Calle calle 321',
                'job_contact' => 'yes', 'relation' => 'colleague', 'user_id' => '2'],
            ['name' => 'Miquel Jackson', 'slug' => Str::slug('Miquel Jackson', '-'), 'birth_date' => '1912-10-10',
                'email' => 'mjackson@email.com', 'phone' =>
                123432123, 'country' => 'Spain', 'address' => 'calle 123, street',
                'job_contact' => 'no', 'relation' => 'family', 'user_id' => '3'],
        ];

        DB::table('contacts')->insert($contacts);
    }
}
