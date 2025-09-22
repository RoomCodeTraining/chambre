<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AssignmentReport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssignmentReportTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/assignmentReports';
    protected string $tableName = 'assignmentReports';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAssignmentReport(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AssignmentReport::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAssignmentReportsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentReport::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AssignmentReport::find(rand(1, 5))->name);
    }

    public function testViewAllAssignmentReportsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentReport::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAssignmentReportValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAssignmentReportData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentReport::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AssignmentReport::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAssignmentReport(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentReport::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAssignmentReport(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AssignmentReport::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AssignmentReport::count());
    }
    
}
