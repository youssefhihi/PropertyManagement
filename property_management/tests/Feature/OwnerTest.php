<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Owner;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OwnerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testOwnerCanBeRetrieved()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard/owners');
        $response->assertStatus(200);
    }

    public function testOwnerCanBeCreated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $owner = Owner::factory()->create();
        $response = $this->post('/dashboard/owners', $owner->toArray());
        $response->assertStatus(200);
    }

    public function testOwnerCanBeUpdated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $owner = Owner::factory()->create();
        $response = $this->put('/dashboard/owners/'. $owner->id, $owner->toArray());
        $response->assertStatus(200);
    }

    public function testOwnerCanBeDeleted()
    {
         $user = User::factory()->create();
        $this->actingAs($user);
        $owner = Owner::factory()->create();
        $response = $this->delete('/dashboard/owners/'.$owner->id);
        $response->assertStatus(200);
    }

    
}
