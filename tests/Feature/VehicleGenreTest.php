<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\VehicleGenre;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleGenreTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/vehicleGenres';
    protected string $tableName = 'vehicleGenres';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateVehicleGenre(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = VehicleGenre::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllVehicleGenresSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleGenre::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(VehicleGenre::find(rand(1, 5))->name);
    }

    public function testViewAllVehicleGenresByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleGenre::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateVehicleGenreValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewVehicleGenreData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleGenre::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(VehicleGenre::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateVehicleGenre(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleGenre::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteVehicleGenre(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        VehicleGenre::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, VehicleGenre::count());
    }
    
}
