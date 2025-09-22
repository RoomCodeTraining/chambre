<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OrganizationType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationTypeTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/organizationTypes';
    protected string $tableName = 'organizationTypes';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOrganizationType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OrganizationType::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOrganizationTypesSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationType::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(OrganizationType::find(rand(1, 5))->name);
    }

    public function testViewAllOrganizationTypesByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationType::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOrganizationTypeValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOrganizationTypeData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationType::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(OrganizationType::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateOrganizationType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationType::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteOrganizationType(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationType::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OrganizationType::count());
    }
    
}
