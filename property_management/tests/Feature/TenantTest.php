<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testTenantCanBeRetrieved()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard/tenants');
        $response->assertStatus(200);
    }

    public function testTenantCanBeCreated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $tenant = Tenant::factory()->create();
        $response = $this->post('/dashboard/tenants', $tenant->toArray());
        $response->assertStatus(200);
    }

    public function testTenantCanBeUpdated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $tenant = Tenant::factory()->create();
        $response = $this->put('/dashboard/tenants/'. $tenant->id, $tenant->toArray());
        $response->assertStatus(200);
    }

    public function testTenantCanBeDeleted()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $tenant = Tenant::factory()->create();
        $response = $this->delete('/dashboard/tenants/'. $tenant->id);
        $response->assertStatus(200);
    }
}
