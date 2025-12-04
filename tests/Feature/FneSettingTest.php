<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\FneSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FneSettingTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/fneSettings';
    protected string $tableName = 'fneSettings';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateFneSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = FneSetting::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllFneSettingsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        FneSetting::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(FneSetting::find(rand(1, 5))->name);
    }

    public function testViewAllFneSettingsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        FneSetting::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateFneSettingValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewFneSettingData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        FneSetting::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(FneSetting::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateFneSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        FneSetting::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteFneSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        FneSetting::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, FneSetting::count());
    }
    
}
