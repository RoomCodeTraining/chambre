<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OfferShock;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferShockTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/offerShocks';
    protected string $tableName = 'offer_shocks';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOfferShock(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OfferShock::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee('1');

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOfferShocksSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShock::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee((string) OfferShock::find(rand(1, 5))->id);
    }

    public function testViewAllOfferShocksByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShock::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOfferShockValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOfferShockData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShock::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee((string) OfferShock::first()->id)
             ->assertStatus(200);
    }

    public function testUpdateOfferShock(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShock::factory()->create();

        $payload = [
            'amount' => 999.99
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee((string) $payload['amount']);
    }

    public function testDeleteOfferShock(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShock::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OfferShock::count());
    }
    
}
