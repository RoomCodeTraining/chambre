<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\NumberPaintElement;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberPaintElementTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/numberPaintElements';
    protected string $tableName = 'numberPaintElements';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateNumberPaintElement(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = NumberPaintElement::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllNumberPaintElementsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberPaintElement::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(NumberPaintElement::find(rand(1, 5))->name);
    }

    public function testViewAllNumberPaintElementsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberPaintElement::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateNumberPaintElementValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewNumberPaintElementData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberPaintElement::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(NumberPaintElement::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateNumberPaintElement(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberPaintElement::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteNumberPaintElement(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberPaintElement::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, NumberPaintElement::count());
    }
    
}
