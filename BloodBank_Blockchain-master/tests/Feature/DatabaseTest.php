<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class DatabaseTest extends TestCase
{
    /**
     * Test if database is working correctly.
     *
     * @return void
     */
    public function testDatabase()
    {
        // Create a user record
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Check if the user exists in the database
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }
}