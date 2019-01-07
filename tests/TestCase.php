<?php
namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Debug\ExceptionHandler; //Class Tests\ExceptionHandler does not exist
use App\Exceptions\Handler; // Class 'Tests\Handler' not found
use Faker;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $faker;

    protected function setUp()
    {
        $this->faker = Faker\Factory::create();
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /**
     * to make the user authenticated admin by default
     * @param null $user
     * @return $this
     */
    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User',["id"=>1]);
        $this->actingAs($user);
        return $this;
    }
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}
            public function report(\Exception $e) {}
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }
    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }

    public function generate_text_with_length_greater_than_the_parameter($max_length_of_the_text)
    {
        $generated_text = $this->faker->text($maxNbChars = $max_length_of_the_text);
        $generated_text .= $generated_text;
        $generated_text .= $generated_text;

        return $generated_text;
    }
}
