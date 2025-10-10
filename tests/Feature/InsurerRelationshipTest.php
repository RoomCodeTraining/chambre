<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\InsurerRelationship;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsurerRelationshipTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/insurerRelationships';
    protected string $tableName = 'insurerRelationships';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateInsurerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = InsurerRelationship::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllInsurerRelationshipsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        InsurerRelationship::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(InsurerRelationship::find(rand(1, 5))->name);
    }

    public function testViewAllInsurerRelationshipsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        InsurerRelationship::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateInsurerRelationshipValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewInsurerRelationshipData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        InsurerRelationship::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(InsurerRelationship::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateInsurerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        InsurerRelationship::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteInsurerRelationship(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        InsurerRelationship::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, InsurerRelationship::count());
    }
    
}
