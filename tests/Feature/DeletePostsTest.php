<?php
namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeletePostsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        // add some user not admin
        factory(User::class)->create(["id"=>99]);
        // add some categories
        factory(Category::class,5)->create();
    }
    public function publishPost($overrides = [])
    {
        $this->withExceptionHandling();
        $this->signIn();
        $new_post = make(Post::class, $overrides);

        return $this->post('/admin/posts/create', $new_post->toArray());
    }

    /** @test */
    public function guests_may_not_delete_posts()
    {
        $this->withExceptionHandling();

        $new_post = create(Post::class);
        $this->delete('/admin/posts/'.$new_post->id)
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_admin_can_delete_posts()
    {
        $this->withExceptionHandling();
        $new_post = create(Post::class);
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $response = $this->delete('/admin/posts/'.$new_post->id);
        $response->assertRedirect('/');
    }

    /** @test */
    public function an_authenticated_user_can_not_delete_posts()
    {
        $this->withExceptionHandling();
        $new_post = create(Post::class);
        $this->signIn();
        $response = $this->delete('/admin/posts/'.$new_post->id);

        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Successfully delete the post.']);
    }


}
