<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\EntityType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EntityTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/entityTypes';
    protected string $tableName = 'entityTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateEntityType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = EntityType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllEntityTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        EntityType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(EntityType::find(rand(1, 5))->name);
    }

    public function testViewAllEntityTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        EntityType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateEntityTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewEntityTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        EntityType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(EntityType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateEntityType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        EntityType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteEntityType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        EntityType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, EntityType::count());
    }
    
}
