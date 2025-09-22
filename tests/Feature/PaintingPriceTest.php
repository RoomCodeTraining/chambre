<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PaintingPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaintingPriceTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/paintingPrices';
    protected string $tableName = 'paintingPrices';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreatePaintingPrice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = PaintingPrice::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllPaintingPricesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaintingPrice::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(PaintingPrice::find(rand(1, 5))->name);
    }

    public function testViewAllPaintingPricesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaintingPrice::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreatePaintingPriceValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewPaintingPriceData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaintingPrice::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(PaintingPrice::first()->name)
             ->assertStatus(200);
    }

    public function testUpdatePaintingPrice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaintingPrice::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeletePaintingPrice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaintingPrice::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, PaintingPrice::count());
    }
    
}
