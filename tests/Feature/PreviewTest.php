<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_accept_valid_token(): void
    {
        cache()->put('preview-1234', 'test');

        $response = $this
            ->get('/preview/1234')
            ->assertStatus(200);

        $this->assertEquals('test', $response->getContent());
    }

    public function test_reject_invalid_token(): void
    {
        $response = $this
            ->get('/preview/1234')
            ->assertStatus(404);
    }
}
