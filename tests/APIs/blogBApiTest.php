<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\blogB;

class blogBApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_blog_b()
    {
        $blogB = factory(blogB::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/blog_bs', $blogB
        );

        $this->assertApiResponse($blogB);
    }

    /**
     * @test
     */
    public function test_read_blog_b()
    {
        $blogB = factory(blogB::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/blog_bs/'.$blogB->id
        );

        $this->assertApiResponse($blogB->toArray());
    }

    /**
     * @test
     */
    public function test_update_blog_b()
    {
        $blogB = factory(blogB::class)->create();
        $editedblogB = factory(blogB::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/blog_bs/'.$blogB->id,
            $editedblogB
        );

        $this->assertApiResponse($editedblogB);
    }

    /**
     * @test
     */
    public function test_delete_blog_b()
    {
        $blogB = factory(blogB::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/blog_bs/'.$blogB->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/blog_bs/'.$blogB->id
        );

        $this->response->assertStatus(404);
    }
}
