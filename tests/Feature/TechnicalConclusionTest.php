<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\TechnicalConclusion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TechnicalConclusionTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/technicalConclusions';
    protected string $tableName = 'technicalConclusions';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateTechnicalConclusion(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = TechnicalConclusion::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllTechnicalConclusionsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        TechnicalConclusion::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(TechnicalConclusion::find(rand(1, 5))->name);
    }

    public function testViewAllTechnicalConclusionsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        TechnicalConclusion::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateTechnicalConclusionValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewTechnicalConclusionData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        TechnicalConclusion::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(TechnicalConclusion::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateTechnicalConclusion(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        TechnicalConclusion::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteTechnicalConclusion(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        TechnicalConclusion::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, TechnicalConclusion::count());
    }
    
}
