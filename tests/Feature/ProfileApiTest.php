<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileApiTest extends TestCase
{

    /**
     * Test the creation of a profile.
     *
     * @return void
     */
    public function test_create_profile()
    {
        // Create a user for authentication
        $user = User::factory()->create();

        // Fake the storage for testing file uploads
        Storage::fake('public');

        // Profile data
        $profileData = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'status' => 'active',
            'image' => UploadedFile::fake()->image('profile.jpg')
        ];

        // Make the request to create a profile
        $response = $this->actingAs($user, 'api')->postJson('/api/profiles', $profileData);

        // Assert the profile was created
        $response->assertStatus(201); // 201 Created

        // assert the response structure or data
        $response->assertJsonStructure([
            'data' => [
                'id',
                'first_name',
                'last_name',
                'status',
                'image',
            ]
        ]);

        // Assert the profile is in the database
        $this->assertDatabaseHas('profiles', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'status' => 'active',
        ]);
    }
}
