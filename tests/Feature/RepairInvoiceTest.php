<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\RepairInvoice;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepairInvoiceTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/repairInvoices';
    protected string $tableName = 'repairInvoices';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRepairInvoice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = RepairInvoice::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllRepairInvoicesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoice::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(RepairInvoice::find(rand(1, 5))->name);
    }

    public function testViewAllRepairInvoicesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoice::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateRepairInvoiceValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewRepairInvoiceData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoice::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(RepairInvoice::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateRepairInvoice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoice::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteRepairInvoice(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        RepairInvoice::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, RepairInvoice::count());
    }
    
}
