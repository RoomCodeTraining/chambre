<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OfferShockWork;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferShockWorkTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/offerShockWorks';
    protected string $tableName = 'offer_shock_works';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOfferShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OfferShockWork::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee('1');

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOfferShockWorksSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShockWork::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee((string) OfferShockWork::find(rand(1, 5))->id);
    }

    public function testViewAllOfferShockWorksByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShockWork::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOfferShockWorkValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOfferShockWorkData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShockWork::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee((string) OfferShockWork::first()->id)
             ->assertStatus(200);
    }

    public function testUpdateOfferShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShockWork::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee('1');
    }

    public function testDeleteOfferShockWork(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferShockWork::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OfferShockWork::count());
    }
    
}
