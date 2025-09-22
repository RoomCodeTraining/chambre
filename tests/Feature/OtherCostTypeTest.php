<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OtherCostType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OtherCostTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/otherCostTypes';
    protected string $tableName = 'otherCostTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOtherCostType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OtherCostType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOtherCostTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCostType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(OtherCostType::find(rand(1, 5))->name);
    }

    public function testViewAllOtherCostTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCostType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOtherCostTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOtherCostTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCostType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(OtherCostType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateOtherCostType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCostType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteOtherCostType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OtherCostType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OtherCostType::count());
    }
    
}
