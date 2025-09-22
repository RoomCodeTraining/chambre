<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\SlipFormatInsurerIntermediary;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlipFormatInsurerIntermediaryTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/slipFormatInsurerIntermediaries';
    protected string $tableName = 'slipFormatInsurerIntermediaries';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateSlipFormatInsurerIntermediary(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = SlipFormatInsurerIntermediary::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllSlipFormatInsurerIntermediariesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        SlipFormatInsurerIntermediary::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(SlipFormatInsurerIntermediary::find(rand(1, 5))->name);
    }

    public function testViewAllSlipFormatInsurerIntermediariesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        SlipFormatInsurerIntermediary::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateSlipFormatInsurerIntermediaryValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewSlipFormatInsurerIntermediaryData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        SlipFormatInsurerIntermediary::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(SlipFormatInsurerIntermediary::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateSlipFormatInsurerIntermediary(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        SlipFormatInsurerIntermediary::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteSlipFormatInsurerIntermediary(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        SlipFormatInsurerIntermediary::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, SlipFormatInsurerIntermediary::count());
    }
    
}
