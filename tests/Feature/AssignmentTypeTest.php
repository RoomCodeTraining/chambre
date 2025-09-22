<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AssignmentType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/assignmentTypes';
    protected string $tableName = 'assignmentTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAssignmentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AssignmentType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAssignmentTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AssignmentType::find(rand(1, 5))->name);
    }

    public function testViewAllAssignmentTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAssignmentTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAssignmentTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AssignmentType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAssignmentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAssignmentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AssignmentType::count());
    }
    
}
