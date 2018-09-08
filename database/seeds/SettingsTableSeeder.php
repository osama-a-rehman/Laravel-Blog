<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'address' => 'Karachi, Pakistan',
            'contact_no' => '+92-213-1234567',
            'contact_email' => 'laravel@info.com'
        ]);
    }
}
