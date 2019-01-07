<?php

namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeTest extends TestCase
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
    function guests_may_not_browse_home()
    {
        $this->withExceptionHandling();
        $this->get('/home')
            ->assertRedirect('/login');
    }



    /** @test */
    function an_authenticated_user_may_browse_home()
    {
        $post = create(Post::class);
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $response = $this->get('/home');
        $response->assertSee($post->title)->assertStatus(200);
    }
}
