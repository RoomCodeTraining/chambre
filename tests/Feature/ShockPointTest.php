<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ShockPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShockPointTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/shockPoints';
    protected string $tableName = 'shockPoints';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateShockPoint(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = ShockPoint::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllShockPointsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockPoint::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(ShockPoint::find(rand(1, 5))->name);
    }

    public function testViewAllShockPointsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockPoint::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateShockPointValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewShockPointData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockPoint::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(ShockPoint::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateShockPoint(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockPoint::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteShockPoint(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockPoint::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, ShockPoint::count());
    }
    
}
