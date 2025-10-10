<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\RepairerRelationship;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepairerRelationshipTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/repairerRelationships';
    protected string $tableName = 'repairerRelationships';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRepairerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = RepairerRelationship::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllRepairerRelationshipsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairerRelationship::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(RepairerRelationship::find(rand(1, 5))->name);
    }

    public function testViewAllRepairerRelationshipsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairerRelationship::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateRepairerRelationshipValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewRepairerRelationshipData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairerRelationship::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(RepairerRelationship::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateRepairerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairerRelationship::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteRepairerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairerRelationship::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, RepairerRelationship::count());
    }
    
}
