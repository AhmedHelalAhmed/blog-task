<?php
namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdatePostsTest extends TestCase
{
    use DatabaseMigrations;

    protected $post;
    public function setUp()
    {
        parent::setUp();
        // add some user not admin
        factory(User::class)->create(["id"=>99]);
        // add some categories
        factory(Category::class,5)->create();
        $this->post=create(Post::class);
    }

    /** @test */
    function guests_may_not_update_posts()
    {
        $this->withExceptionHandling();
        // create post page
        $this->put('/admin/posts/'.$this->post->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_admin_can_update_new_post()
    {
        // login as admin
        $this->signIn();
        $post = make(Post::class);
        $response = $this->put('/admin/posts/'.$this->post->id,$post->toArray());
        $this->get($response->headers->get('location'))->assertSee($post->title);
    }



    /** @test */
    function an_authenticated_user_can_not_update_new_post()
    {
        // login as not admin
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $post = make(Post::class);
        $response = $this->put('/admin/posts/'.$this->post->id,$post->toArray());
        $response->assertRedirect('/');
    }



    public function updatePost($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $post = make(Post::class,$overrides);
        return $this->put('/admin/posts/'.$this->post->id,$post->toArray());
    }


    /** @test */
    function a_update_post_requires_a_title()
    {
        $this->updatePost(['title'=>null])
            ->assertSessionHasErrors('title');
    }


    /** @test */
    function a_update_post_requires_a_content()
    {
        $this->updatePost(['content'=>null])
            ->assertSessionHasErrors('content');
    }

    /** @test */
    function a_update_post_requires_a_description()
    {
        $this->updatePost(['description'=>null])
            ->assertSessionHasErrors('description');
    }

    /** @test */
    function a_update_post_requires_a_category()
    {
        //to test the failure if the category exist in memory which is testing database configured
        factory(Category::class,2)->create();//give channel_id = 1 or 2
        $this->updatePost(['category_id' => null])
            ->assertSessionHasErrors('category_id');

    }

    /** @test */
    function a_update_post_requires_an_exists_category()
    {
        //to test the failure if the category exist in memory which is testing database configured
        factory(Category::class,2)->create();//give channel_id = 1 or 2
        $this->updatePost(['category_id' => 99999999])
            ->assertSessionHasErrors('category_id');
    }


    /** @test */
    function a_update_post_title_requires_text_at_min_3_characters()
    {
        $invalidInput="AB";
        $this->updatePost(['title'=>$invalidInput])
            ->assertSessionHasErrors('title');
    }


    /** @test */
    function a_update_post_title_requires_text_at_max_70_characters()
    {
        $invalidInput=$this->generate_text_with_length_greater_than_the_parameter(70);
        $this->updatePost(['title'=>$invalidInput])
            ->assertSessionHasErrors('title');
    }




    /** @test */
    function a_update_post_description_requires_text_at_min_35_characters()
    {
        $invalidInput="AB";
        $this->updatePost(['description'=>$invalidInput])
            ->assertSessionHasErrors('description');
    }


    /** @test */
    function a_update_post_description_requires_text_at_max_100_characters()
    {
        $invalidInput=$this->generate_text_with_length_greater_than_the_parameter(100);
        $this->updatePost(['description'=>$invalidInput])
            ->assertSessionHasErrors('description');
    }


    /** @test */
    function a_update_post_content_requires_text_at_min_100_characters()
    {
        $invalidInput="AB";
        $this->updatePost(['content'=>$invalidInput])
            ->assertSessionHasErrors('content');
    }

}
