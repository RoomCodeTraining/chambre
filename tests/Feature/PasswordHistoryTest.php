<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PasswordHistory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordHistoryTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/passwordHistories';
    protected string $tableName = 'passwordHistories';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreatePasswordHistory(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = PasswordHistory::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllPasswordHistoriesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PasswordHistory::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(PasswordHistory::find(rand(1, 5))->name);
    }

    public function testViewAllPasswordHistoriesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PasswordHistory::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreatePasswordHistoryValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewPasswordHistoryData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PasswordHistory::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(PasswordHistory::first()->name)
             ->assertStatus(200);
    }

    public function testUpdatePasswordHistory(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PasswordHistory::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeletePasswordHistory(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PasswordHistory::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, PasswordHistory::count());
    }
    
}
