<?php

namespace Tests\Unit;

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexReturnsCorrectView()
    {
        // Mock the view
        View::shouldReceive('make')
            ->once()
            ->with('Users.User.home',[],[])
            ->andReturn('mocked_view');

        // Create an instance of the HomeController
        $controller = new HomeController();

        // Call the index method
        $response = $controller->index();

        // Assert that the correct view is returned
        $this->assertEquals('mocked_view', $response);
    }
}
