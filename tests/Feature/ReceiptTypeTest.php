<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ReceiptType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiptTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/receiptTypes';
    protected string $tableName = 'receiptTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateReceiptType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = ReceiptType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllReceiptTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ReceiptType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(ReceiptType::find(rand(1, 5))->name);
    }

    public function testViewAllReceiptTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ReceiptType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateReceiptTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewReceiptTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ReceiptType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(ReceiptType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateReceiptType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ReceiptType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteReceiptType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ReceiptType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, ReceiptType::count());
    }
    
}
