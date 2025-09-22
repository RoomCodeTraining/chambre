<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PaymentType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/paymentTypes';
    protected string $tableName = 'paymentTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreatePaymentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = PaymentType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllPaymentTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaymentType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(PaymentType::find(rand(1, 5))->name);
    }

    public function testViewAllPaymentTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaymentType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreatePaymentTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewPaymentTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaymentType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(PaymentType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdatePaymentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaymentType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeletePaymentType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        PaymentType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, PaymentType::count());
    }
    
}
