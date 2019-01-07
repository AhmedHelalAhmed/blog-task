<?php
namespace Tests\Feature;

use App\{Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory;
use Tests\TestCase;

class EditCategoriesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_may_not_edit_categories()
    {
        $new_category = create(Category::class);
        $this->withExceptionHandling();
        $this->get('/admin/categories/'.$new_category->id."/edit/")->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_admin_can_edit_categories()
    {
        $this->signIn();
        $post = create(Category::class);
        $faker = Factory::create();

        $post_with_new_data = [
            'name' => $faker->words($nb = 3, $asText = true),
        ];
        $this->get('/admin/categories/'.$post->id."/edit/", $post_with_new_data)
            ->assertStatus(200);
    }


    /** @test */
    public function an_authenticated_user_can_not_edit_categories()
    {
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $category = create(Category::class);
        $faker = Factory::create();
        $post_with_new_data = [
            'name' => $faker->words($nb = 3, $asText = true),
        ];
        $this->get('/admin/categories/'.$category->id."/edit/", $post_with_new_data)
            ->assertRedirect('/');
    }


}
