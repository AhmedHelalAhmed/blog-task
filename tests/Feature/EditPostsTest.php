<?php
namespace Tests\Feature;

use App\{Post,Category,User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory;
use Tests\TestCase;

class EditPostsTest extends TestCase
{
    use DatabaseMigrations;

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
    public function guests_may_not_edit_posts()
    {
        $new_post = create(Post::class);
        $this->withExceptionHandling();
        $this->get('/admin/posts/'.$new_post->id."/edit/")->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_admin_can_edit_posts()
    {
        $this->signIn();
        $post = create(Post::class);
        $faker = Factory::create();

        $post_with_new_data = [
            'title' => $faker->words($nb = 3, $asText = true),
            'content'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'description'=>$faker->text($maxNbChars = 100),
            'category_id'=>Category::all()->random(1)->first()->id
        ];
        $this->get('/admin/posts/'.$post->id."/edit/", $post_with_new_data)
            ->assertStatus(200);
    }


    /** @test */
    public function an_authenticated_user_can_not_edit_posts()
    {
        $user_not_admin=factory(User::class)->create(["id"=>2]);
        $this->signIn($user_not_admin);
        $post = create(Post::class);
        $faker = Factory::create();
        $post_with_new_data = [
            'title' => $faker->words($nb = 3, $asText = true),
            'content'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'description'=>$faker->text($maxNbChars = 100),
            'category_id'=>Category::all()->random(1)->first()->id
        ];
        $this->get('/admin/posts/'.$post->id."/edit/", $post_with_new_data)
            ->assertRedirect('/');
    }


}
