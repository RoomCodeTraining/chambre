<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\StatusDeadline;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusDeadlineTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/statusDeadlines';
    protected string $tableName = 'statusDeadlines';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateStatusDeadline(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = StatusDeadline::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllStatusDeadlinesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        StatusDeadline::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(StatusDeadline::find(rand(1, 5))->name);
    }

    public function testViewAllStatusDeadlinesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        StatusDeadline::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateStatusDeadlineValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewStatusDeadlineData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        StatusDeadline::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(StatusDeadline::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateStatusDeadline(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        StatusDeadline::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteStatusDeadline(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        StatusDeadline::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, StatusDeadline::count());
    }
    
}
