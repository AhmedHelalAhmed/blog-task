<?php


namespace Tests\Unit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\{Post,Category,User};
class PostTest extends TestCase
{
    use DatabaseMigrations; //because we use sqlite in memory


    public function setUp()
    {
        parent::setUp();
        // add some users
        factory(User::class,5)->create();
        // add some categories
        factory(Category::class,5)->create();
    }


    /** @test */
    function a_post_has_category()
    {
        // generate a post
        $post = create(Post::class);
        $this->assertInstanceOf(Category::class,$post->category);
    }

    /** @test */
    function a_post_has_a_creator()
    {
        // generate a post
        $post = create(Post::class);
        $this->assertInstanceOf(User::class,$post->user);
    }
}
