<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transcript;
use App\Models\User;

class TranscriptSeeder extends Seeder
{
    public function run()
    {
        $user = User::first(); // Assign to the first user

        Transcript::create(['user_id' => $user->id, 'course' => 'Web Security', 'grade' => 'A']);
        Transcript::create(['user_id' => $user->id, 'course' => 'Network Security', 'grade' => 'B+']);
        Transcript::create(['user_id' => $user->id, 'course' => 'Cryptography', 'grade' => 'A-']);
    }
}

