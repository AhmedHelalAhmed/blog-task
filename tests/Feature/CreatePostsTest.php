<?php
namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreatePostsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        // add some categories
        factory(Category::class,5)->create();
    }

    /** @test */
    function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();
        // create post page
        $this->get('/admin/posts/create')
            ->assertRedirect('/login');
        // store thread data
        $this->post('/admin/posts')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_admin_can_create_new_post()
    {
        // login as admin
        $this->signIn();
        $post = make(Post::class);
        $response = $this->post('/admin/posts',$post->toArray());
        $this->get($response->headers->get('location'))->assertSee($post->title);
    }

    /** @test */
    function an_authenticated_user_can_not_create_new_post()
    {
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $post = make(Post::class);
        $response = $this->post('/admin/posts',$post->toArray());
        $response->assertRedirect('/');
    }

    public function publishPost($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $post = make(Post::class,$overrides);
        return $this->post('/admin/posts',$post->toArray());
    }


    /** @test */
    function a_post_requires_a_title()
    {
        $this->publishPost(['title'=>null])
            ->assertSessionHasErrors('title');
    }


    /** @test */
    function a_post_requires_a_content()
    {
        $this->publishPost(['content'=>null])
            ->assertSessionHasErrors('content');
    }

    /** @test */
    function a_post_requires_a_description()
    {
        $this->publishPost(['description'=>null])
            ->assertSessionHasErrors('description');
    }

    /** @test */
    function a_post_requires_a_category()
    {
        //to test the failure if the category exist in memory which is testing database configured
        factory(Category::class,2)->create();//give channel_id = 1 or 2
        $this->publishPost(['category_id' => null])
            ->assertSessionHasErrors('category_id');

    }

    /** @test */
    function a_post_requires_an_exists_category()
    {
        //to test the failure if the category exist in memory which is testing database configured
        factory(Category::class,2)->create();//give channel_id = 1 or 2
        $this->publishPost(['category_id' => 99999999])
            ->assertSessionHasErrors('category_id');
    }


    /** @test */
    function a_post_title_requires_text_at_min_3_characters()
    {
        $invalidInput="AB";
        $this->publishPost(['title'=>$invalidInput])
            ->assertSessionHasErrors('title');
    }


    /** @test */
    function a_post_title_requires_text_at_max_70_characters()
    {
        $invalidInput=$this->generate_text_with_length_greater_than_the_parameter(70);
        $this->publishPost(['title'=>$invalidInput])
            ->assertSessionHasErrors('title');
    }




    /** @test */
    function a_post_description_requires_text_at_min_35_characters()
    {
        $invalidInput="AB";
        $this->publishPost(['description'=>$invalidInput])
            ->assertSessionHasErrors('description');
    }


    /** @test */
    function a_post_description_requires_text_at_max_100_characters()
    {
        $invalidInput=$this->generate_text_with_length_greater_than_the_parameter(100);
        $this->publishPost(['description'=>$invalidInput])
            ->assertSessionHasErrors('description');
    }


    /** @test */
    function a_post_content_requires_text_at_min_100_characters()
    {
        $invalidInput="AB";
        $this->publishPost(['content'=>$invalidInput])
            ->assertSessionHasErrors('content');
    }

}
