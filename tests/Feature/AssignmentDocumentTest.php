<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AssignmentDocument;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentDocumentTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/assignmentDocuments';
    protected string $tableName = 'assignmentDocuments';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAssignmentDocument(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AssignmentDocument::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAssignmentDocumentsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentDocument::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AssignmentDocument::find(rand(1, 5))->name);
    }

    public function testViewAllAssignmentDocumentsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentDocument::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAssignmentDocumentValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAssignmentDocumentData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentDocument::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AssignmentDocument::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAssignmentDocument(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentDocument::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAssignmentDocument(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentDocument::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AssignmentDocument::count());
    }
    
}
