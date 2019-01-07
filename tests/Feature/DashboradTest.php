<?php

namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DashboradTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        // add some user not admin
        factory(User::class)->create(["id"=>99]);
        // add some categories
        factory(Category::class,5)->create();
        $this->post=create(Post::class);
    }

    use DatabaseMigrations;

    /** @test */
    function guests_may_not_browse_dashboard()
    {
        $this->withExceptionHandling();
        $this->get('/admin')
            ->assertRedirect('/login');
    }



    /** @test */
    function an_authenticated_user_may_not_browse_dashboard()
    {
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $response = $this->get('/admin');
        $response->assertRedirect('/');
    }


    /** @test */
    function an_authenticated_admin_may_browse_dashboard()
    {
        $this->signIn();
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }
}
