<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OtherCost;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCostTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/otherCosts';
    protected string $tableName = 'otherCosts';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOtherCost(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OtherCost::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOtherCostsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCost::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(OtherCost::find(rand(1, 5))->name);
    }

    public function testViewAllOtherCostsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCost::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOtherCostValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOtherCostData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCost::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(OtherCost::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateOtherCost(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCost::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteOtherCost(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCost::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OtherCost::count());
    }
    
}
