<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AssignmentExpert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentExpertTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/assignmentExperts';
    protected string $tableName = 'assignmentExperts';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAssignmentExpert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AssignmentExpert::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAssignmentExpertsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentExpert::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AssignmentExpert::find(rand(1, 5))->name);
    }

    public function testViewAllAssignmentExpertsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentExpert::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAssignmentExpertValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAssignmentExpertData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentExpert::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AssignmentExpert::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAssignmentExpert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentExpert::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAssignmentExpert(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentExpert::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AssignmentExpert::count());
    }
    
}
