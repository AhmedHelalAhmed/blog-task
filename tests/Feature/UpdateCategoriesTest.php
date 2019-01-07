<?php
namespace Tests\Feature;
use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateCategoriesTest extends TestCase
{
    use DatabaseMigrations;

    protected $category;
    public function setUp()
    {
        parent::setUp();
        // add some user not admin
        factory(User::class)->create(["id"=>99]);
        // add some categories
        factory(Category::class,5)->create();
        $this->category=create(Post::class);
    }

    /** @test */
    function guests_may_not_update_posts()
    {
        $this->withExceptionHandling();
        $this->put('/admin/categories/'.$this->category->id)
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_admin_can_update_new_post()
    {
        // login as admin
        $this->signIn();
        $category = make(Category::class);
        $response = $this->put('/admin/categories/'.$this->category->id,$category->toArray());
        $this->get($response->headers->get('location'))->assertSee($category->name);
    }



    /** @test */
    function an_authenticated_user_can_not_update_new_post()
    {
        // login as not admin
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $category = make(Category::class);
        $response = $this->put('/admin/categories/'.$this->category->id,$category->toArray());
        $response->assertRedirect('/');
    }



    public function updateCategory($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $post = make(Category::class,$overrides);
        return $this->put('/admin/categories/'.$this->category->id,$post->toArray());
    }


    /** @test */
    function a_update_category_requires_a_name()
    {
        $this->updateCategory(['name'=>null])
            ->assertSessionHasErrors('name');
    }




    /** @test */
    function a_update_category_name_requires_text_at_min_3_characters()
    {
        $invalidInput="AB";
        $this->updateCategory(['name'=>$invalidInput])
            ->assertSessionHasErrors('name');
    }



}
