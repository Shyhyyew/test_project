<?php

namespace Tests\Feature;

use App\Models\Data;
use App\Models\User;
use Tests\TestCase;

class DataTest extends TestCase
{
    public string $data = '{"item_1": 1, "item_2": 2}';
    public int $data_id = 5;

    protected function setUp(): void
    {
        parent::setUp();
        if (!defined('LARAVEL_START')) {
            define('LARAVEL_START', microtime(true));
        }
    }

    /**
     * Data creating test.
     * @test
     */
    public function test_it_creates_new_data(): void
    {
        $user = User::first();

        $this->actingAs($user, 'api');
        $response = $this->post('/api/data/create', ['data' => $this->data]);
        $response->assertStatus(200);
        $this->data_id = $response['data']['id'];
    }

    /**
     * Data creating test.
     * @test
     */
    public function test_it_updates_existing_data(): void
    {
        $user = User::first();
        $data_entity = Data::latest()->first();
        $code = '$data->item_1 = 9;';

        $object = json_decode($this->data);
        $object->item_1 = 9;

        $this->actingAs($user, 'api');
        $response = $this->post("/api/data/$data_entity->id/update", ['code' => $code]);

        $response->assertStatus(200);
    }

    /**
     * Data creating test.
     * @test
     */
    public function test_it_deletes_data(): void
    {
        $data_entity = Data::latest()->first();

        $response = $this->delete("/api/data/$data_entity->id/delete");

        $response->assertStatus(200);
    }
}
