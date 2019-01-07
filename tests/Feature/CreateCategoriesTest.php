<?php
namespace Tests\Feature;
use App\{Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateCategoriesTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    function guests_may_not_create_posts()
    {
        $this->withExceptionHandling();
        // create post page
        $this->get('/admin/categories/create')
            ->assertRedirect('/login');
        // store thread data
        $this->post('/admin/categories')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_admin_can_create_new_category()
    {
        // login as admin
        $this->signIn();
        $category = make(Category::class);
        $response = $this->post('/admin/categories',$category->toArray());

        $this->get($response->headers->get('location'))->assertSee($category->name);
    }

    /** @test */
    function an_authenticated_user_can_not_create_new_categories()
    {
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $category = make(Category::class);
        $response = $this->post('/admin/categories',$category->toArray());
        $response->assertRedirect('/');
    }

    public function publishCategory($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $post = make(Category::class,$overrides);
        return $this->post('/admin/categories',$post->toArray());
    }


    /** @test */
    function a_category_requires_a_name()
    {
        $this->publishCategory(['name'=>null])
            ->assertSessionHasErrors('name');
    }


    /** @test */
    function a_category_name_requires_text_at_min_3_characters()
    {
        $invalidInput="AB";
        $this->publishCategory(['name'=>$invalidInput])
            ->assertSessionHasErrors('name');
    }



}
