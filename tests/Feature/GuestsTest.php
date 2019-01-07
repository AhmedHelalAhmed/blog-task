<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class GuestsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_guest_can_see_welcome_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_can_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function a_guest_can_sign_up()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

}
