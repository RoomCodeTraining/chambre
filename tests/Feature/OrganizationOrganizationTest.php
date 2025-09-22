<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\OrganizationOrganization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrganizationOrganizationTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/organizationOrganizations';
    protected string $tableName = 'organizationOrganizations';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOrganizationOrganization(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = OrganizationOrganization::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllOrganizationOrganizationsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationOrganization::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(OrganizationOrganization::find(rand(1, 5))->name);
    }

    public function testViewAllOrganizationOrganizationsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationOrganization::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateOrganizationOrganizationValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewOrganizationOrganizationData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationOrganization::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(OrganizationOrganization::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateOrganizationOrganization(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationOrganization::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteOrganizationOrganization(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        OrganizationOrganization::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, OrganizationOrganization::count());
    }
    
}
