<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OfferWorkforce;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferWorkforceTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/offerWorkforces';
    protected string $tableName = 'offer_workforces';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOfferWorkforce(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OfferWorkforce::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee('1');

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOfferWorkforcesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferWorkforce::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee((string) OfferWorkforce::find(rand(1, 5))->id);
    }

    public function testViewAllOfferWorkforcesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferWorkforce::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOfferWorkforceValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOfferWorkforceData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferWorkforce::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee((string) OfferWorkforce::first()->id)
             ->assertStatus(200);
    }

    public function testUpdateOfferWorkforce(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferWorkforce::factory()->create();

        $payload = [
            'amount' => 999.99
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee((string) $payload['amount']);
    }

    public function testDeleteOfferWorkforce(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OfferWorkforce::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OfferWorkforce::count());
    }
    
}
