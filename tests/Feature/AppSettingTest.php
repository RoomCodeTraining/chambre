<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\AppSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppSettingTest extends TestCase
{
    use  RefreshDatabase;

    protected string $endpoint = '/api/appSettings';
    protected string $tableName = 'appSettings';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateAppSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $payload = AppSetting::factory()->make([])->toArray();

        $this->json('POST', $this->endpoint, $payload)
             ->assertStatus(201)
             ->assertSee($payload['name']);

        $this->assertDatabaseHas($this->tableName, ['id' => 1]);
    }

    public function testViewAllAppSettingsSuccessfully(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AppSetting::factory(5)->create();

        $this->json('GET', $this->endpoint)
             ->assertStatus(200)
             ->assertJsonCount(5, 'data')
             ->assertSee(AppSetting::find(rand(1, 5))->name);
    }

    public function testViewAllAppSettingsByFooFilter(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AppSetting::factory(5)->create();

        $this->json('GET', $this->endpoint.'?foo=1')
             ->assertStatus(200)
             ->assertSee('foo')
             ->assertDontSee('foo');
    }

    public function testsCreateAppSettingValidation(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        $data = [
        ];

        $this->json('post', $this->endpoint, $data)
             ->assertStatus(422);
    }

    public function testViewAppSettingData(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AppSetting::factory()->create();

        $this->json('GET', $this->endpoint.'/1')
             ->assertSee(AppSetting::first()->name)
             ->assertStatus(200);
    }

    public function testUpdateAppSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AppSetting::factory()->create();

        $payload = [
            'name' => 'Random'
        ];

        $this->json('PUT', $this->endpoint.'/1', $payload)
             ->assertStatus(200)
             ->assertSee($payload['name']);
    }

    public function testDeleteAppSetting(): void
    {
        $this->markTestIncomplete('This test case needs review.');

        $this->actingAs(User::factory()->create());

        AppSetting::factory()->create();

        $this->json('DELETE', $this->endpoint.'/1')
             ->assertStatus(204);

        $this->assertEquals(0, AppSetting::count());
    }
    
}
