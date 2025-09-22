<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\GeneralState;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GeneralStateTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/generalStates';
    protected string $tableName = 'generalStates';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateGeneralState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = GeneralState::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllGeneralStatesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        GeneralState::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(GeneralState::find(rand(1, 5))->name);
    }

    public function testViewAllGeneralStatesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        GeneralState::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateGeneralStateValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewGeneralStateData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        GeneralState::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(GeneralState::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateGeneralState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        GeneralState::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteGeneralState(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        GeneralState::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, GeneralState::count());
    }
    
}
