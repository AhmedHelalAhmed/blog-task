<?php


namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_category_contents_posts()
    {
        $category = create('App\Category');
        // add some users
        factory(User::class,5)->create();
        $post = create('App\Post',['category_id' => $category->id]);
        $this->assertTrue($category->posts->contains($post));
    }
}
