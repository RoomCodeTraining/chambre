<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ExpertiseType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpertiseTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/expertiseTypes';
    protected string $tableName = 'expertiseTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateExpertiseType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = ExpertiseType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllExpertiseTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(ExpertiseType::find(rand(1, 5))->name);
    }

    public function testViewAllExpertiseTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateExpertiseTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewExpertiseTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(ExpertiseType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateExpertiseType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteExpertiseType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, ExpertiseType::count());
    }
    
}
