<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AssignmentRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentRequestTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/assignmentRequests';
    protected string $tableName = 'assignmentRequests';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAssignmentRequest(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AssignmentRequest::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAssignmentRequestsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentRequest::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AssignmentRequest::find(rand(1, 5))->name);
    }

    public function testViewAllAssignmentRequestsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentRequest::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAssignmentRequestValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAssignmentRequestData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentRequest::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AssignmentRequest::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAssignmentRequest(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentRequest::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAssignmentRequest(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentRequest::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AssignmentRequest::count());
    }
    
}
