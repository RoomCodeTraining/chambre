<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Comparison;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ComparisonTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/comparisons';
    protected string $tableName = 'comparisons';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateComparison(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = Comparison::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['reference']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllComparisonsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Comparison::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(Comparison::find(rand(1, 5))->reference);
    }

    public function testViewAllComparisonsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Comparison::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateComparisonValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewComparisonData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Comparison::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(Comparison::first()->reference)
             ->assertStatus(200);
    }

    public function testUpdateComparison(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Comparison::factory()->create();

        $payload = [
            'reference' => 'CMP-' . \Illuminate\Support\Str::random(8)
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['reference']);
    }

    public function testDeleteComparison(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        Comparison::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, Comparison::count());
    }
    
}
