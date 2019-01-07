<?php
namespace Tests\Feature;
use App\{Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteCategoriesTest extends TestCase
{
    use DatabaseMigrations;

    public function publishCategory($overrides = [])
    {
        $this->withExceptionHandling();
        $this->signIn();
        $new_post = make(Category::class, $overrides);
        return $this->post('/admin/categories/create', $new_post->toArray());
    }

    /** @test */
    public function guests_may_not_delete_posts()
    {
        $this->withExceptionHandling();

        $new_category = create(Category::class);
        $this->delete('/admin/categories/'.$new_category->id)
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_admin_can_delete_posts()
    {
        $this->withExceptionHandling();
        $new_category = create(Category::class);
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $response = $this->delete('/admin/categories/'.$new_category->id);
        $response->assertRedirect('/');
    }

    /** @test */
    public function an_authenticated_user_can_not_delete_posts()
    {
        $this->withExceptionHandling();
        $new_category = create(Category::class);
        $this->signIn();
        $response = $this->delete('/admin/categories/'.$new_category->id);

        $response
            ->assertStatus(200)
            ->assertJson(['message' => 'Successfully delete the category.']);
    }


}
