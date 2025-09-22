<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ExpertiseCarriedOut;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExpertiseCarriedOutTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/expertiseCarriedOuts';
    protected string $tableName = 'expertiseCarriedOuts';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateExpertiseCarriedOut(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = ExpertiseCarriedOut::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllExpertiseCarriedOutsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseCarriedOut::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(ExpertiseCarriedOut::find(rand(1, 5))->name);
    }

    public function testViewAllExpertiseCarriedOutsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseCarriedOut::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateExpertiseCarriedOutValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewExpertiseCarriedOutData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseCarriedOut::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(ExpertiseCarriedOut::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateExpertiseCarriedOut(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseCarriedOut::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteExpertiseCarriedOut(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        ExpertiseCarriedOut::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, ExpertiseCarriedOut::count());
    }
    
}
