<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\HourlyRate;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HourlyRateTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/hourlyRates';
    protected string $tableName = 'hourlyRates';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateHourlyRate(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = HourlyRate::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllHourlyRatesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        HourlyRate::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(HourlyRate::find(rand(1, 5))->name);
    }

    public function testViewAllHourlyRatesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        HourlyRate::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateHourlyRateValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewHourlyRateData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        HourlyRate::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(HourlyRate::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateHourlyRate(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        HourlyRate::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteHourlyRate(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        HourlyRate::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, HourlyRate::count());
    }
    
}
