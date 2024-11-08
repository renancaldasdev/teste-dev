<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Contacts\Models\Contact;
use App\Users\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        Contact::factory()->count(50)->create();
    }
}
