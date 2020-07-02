<?php namespace Tests\Repositories;

use App\Models\blogB;
use App\Repositories\blogBRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class blogBRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var blogBRepository
     */
    protected $blogBRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->blogBRepo = \App::make(blogBRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_blog_b()
    {
        $blogB = factory(blogB::class)->make()->toArray();

        $createdblogB = $this->blogBRepo->create($blogB);

        $createdblogB = $createdblogB->toArray();
        $this->assertArrayHasKey('id', $createdblogB);
        $this->assertNotNull($createdblogB['id'], 'Created blogB must have id specified');
        $this->assertNotNull(blogB::find($createdblogB['id']), 'blogB with given id must be in DB');
        $this->assertModelData($blogB, $createdblogB);
    }

    /**
     * @test read
     */
    public function test_read_blog_b()
    {
        $blogB = factory(blogB::class)->create();

        $dbblogB = $this->blogBRepo->find($blogB->id);

        $dbblogB = $dbblogB->toArray();
        $this->assertModelData($blogB->toArray(), $dbblogB);
    }

    /**
     * @test update
     */
    public function test_update_blog_b()
    {
        $blogB = factory(blogB::class)->create();
        $fakeblogB = factory(blogB::class)->make()->toArray();

        $updatedblogB = $this->blogBRepo->update($fakeblogB, $blogB->id);

        $this->assertModelData($fakeblogB, $updatedblogB->toArray());
        $dbblogB = $this->blogBRepo->find($blogB->id);
        $this->assertModelData($fakeblogB, $dbblogB->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_blog_b()
    {
        $blogB = factory(blogB::class)->create();

        $resp = $this->blogBRepo->delete($blogB->id);

        $this->assertTrue($resp);
        $this->assertNull(blogB::find($blogB->id), 'blogB should not exist in DB');
    }
}
