<?php

namespace Tests\Unit;

use App\Http\Controllers\Admin\admin_OrganizationCtr;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class adminOrgTest extends TestCase
{
    use RefreshDatabase;

    public function testAddOrganizationReturnsCorrectView()
    {
        // Mock the view
        View::shouldReceive('make')
            ->once()
            ->with('Users.Admin.Organizations.addOrganization',[],[])
            ->andReturn('mocked_view');

        // Create an instance of the admin_OrganizationCtr
        $controller = new admin_OrganizationCtr();

        // Call the index method
        $response = $controller->addOrganization();

        // Assert that the correct view is returned
        $this->assertEquals('mocked_view', $response);
    }


}