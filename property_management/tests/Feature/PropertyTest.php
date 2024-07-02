<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Property;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PropertyTest extends TestCase
{
    use RefreshDatabase; 
    /**
     * A basic feature test example.
     */
    public function testPropertyCanBeRetrieved()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard/properties');
        $response->assertStatus(200);
        
    }
    public function testPropertyCanBeCreated()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $property = Property::factory()->create();
        $response = $this->post('/dashboard/properties', $property->toArray());

        $response->assertStatus(200);
    }
}
