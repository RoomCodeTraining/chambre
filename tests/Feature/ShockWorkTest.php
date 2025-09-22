<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ShockWork;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShockWorkTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/shockWorks';
    protected string $tableName = 'shockWorks';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = ShockWork::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllShockWorksSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockWork::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(ShockWork::find(rand(1, 5))->name);
    }

    public function testViewAllShockWorksByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockWork::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateShockWorkValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewShockWorkData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockWork::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(ShockWork::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockWork::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ShockWork::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, ShockWork::count());
    }
    
}
