<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\VehicleState;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleStateTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/vehicleStates';
    protected string $tableName = 'vehicleStates';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateVehicleState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = VehicleState::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllVehicleStatesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleState::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(VehicleState::find(rand(1, 5))->name);
    }

    public function testViewAllVehicleStatesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleState::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateVehicleStateValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewVehicleStateData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleState::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(VehicleState::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateVehicleState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleState::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteVehicleState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleState::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, VehicleState::count());
    }
    
}
