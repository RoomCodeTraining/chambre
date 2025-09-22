<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\RepairInvoiceType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepairInvoiceTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/repairInvoiceTypes';
    protected string $tableName = 'repairInvoiceTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRepairInvoiceType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = RepairInvoiceType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllRepairInvoiceTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoiceType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(RepairInvoiceType::find(rand(1, 5))->name);
    }

    public function testViewAllRepairInvoiceTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoiceType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateRepairInvoiceTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewRepairInvoiceTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoiceType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(RepairInvoiceType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateRepairInvoiceType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoiceType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteRepairInvoiceType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoiceType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, RepairInvoiceType::count());
    }
    
}
