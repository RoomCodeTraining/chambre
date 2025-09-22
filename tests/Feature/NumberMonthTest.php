<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\NumberMonth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NumberMonthTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/numberMonths';
    protected string $tableName = 'numberMonths';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateNumberMonth(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = NumberMonth::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllNumberMonthsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberMonth::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(NumberMonth::find(rand(1, 5))->name);
    }

    public function testViewAllNumberMonthsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberMonth::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateNumberMonthValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewNumberMonthData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberMonth::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(NumberMonth::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateNumberMonth(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberMonth::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteNumberMonth(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        NumberMonth::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, NumberMonth::count());
    }
    
}
