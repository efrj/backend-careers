<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\JobOportunity;
use App\Models\User;

class JobOportunityTest extends TestCase
{
    public function testsJobOportunityAreCreatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Job one',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
            'salary' => 3655.95
        ];

        $this->json('POST', '/api/job-oportunities', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'title' => 'Job one',
                'description' => 'This is a perfect job.',
                'status' => 'active',
                'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
                'salary' => 3655.95
            ]);
    }

    public function testsJobOportunityAreUpdatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $job_oportunity = JobOportunity::factory()->create([
            'title' => 'Job one',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
            'salary' => 3655.95
        ]);

        $payload = [
            'title' => 'Job one',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
            'salary' => 3655.95
        ];

        $response = $this->json('PUT', '/api/job-oportunities/' . $job_oportunity->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'title' => 'Job one',
                'description' => 'This is a perfect job.',
                'status' => 'active',
                'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
                'salary' => 3655.95
            ]);
    }

    public function testsJobOportunityAreDeletedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $job_oportunity = JobOportunity::factory()->create([
            'title' => 'Job one',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
            'salary' => 3655.95
        ]);

        $this->json('DELETE', '/api/job-oportunities/' . $job_oportunity->id, [], $headers)
            ->assertStatus(204);
    }

    public function testJobOportunityAreListedCorrectly()
    {
        JobOportunity::factory()->create([
            'title' => 'Job one',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
            'salary' => 3655.95
        ]);

        JobOportunity::factory()->create([
            'title' => 'Job Two',
            'description' => 'This is a perfect job.',
            'status' => 'active',
            'workplace' => '1500 Reuben Rapids Suite 222. New Kadetown, MD 34352',
            'salary' => 4555.95
        ]);

        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/job-oportunities', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [
                'title' => 'Job one',
                'description' => 'This is a perfect job.',
                'status' => 'active',
                'workplace' => '945 Reuben Rapids Suite 197. New Kadetown, MD 34356',
                'salary' => 3655.95
            ],
            [
                'title' => 'Job Two',
                'description' => 'This is a perfect job.',
                'status' => 'active',
                'workplace' => '1500 Reuben Rapids Suite 222. New Kadetown, MD 34352',
                'salary' => 4555.95
            ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'title', 'description', 'status', 'workplace', 'salary', 'created_at', 'updated_at'],
            ]);
    }

}
