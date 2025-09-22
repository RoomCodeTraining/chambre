<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\VehicleEnergy;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleEnergyTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/vehicleEnergies';
    protected string $tableName = 'vehicleEnergies';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateVehicleEnergy(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = VehicleEnergy::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllVehicleEnergiesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleEnergy::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(VehicleEnergy::find(rand(1, 5))->name);
    }

    public function testViewAllVehicleEnergiesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleEnergy::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateVehicleEnergyValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewVehicleEnergyData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleEnergy::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(VehicleEnergy::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateVehicleEnergy(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleEnergy::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteVehicleEnergy(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleEnergy::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, VehicleEnergy::count());
    }
    
}
