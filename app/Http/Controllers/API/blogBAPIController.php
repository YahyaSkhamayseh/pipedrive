<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateblogBAPIRequest;
use App\Http\Requests\API\UpdateblogBAPIRequest;
use App\Models\blogB;
use App\Repositories\blogBRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class blogBController
 * @package App\Http\Controllers\API
 */

class blogBAPIController extends AppBaseController
{
    /** @var  blogBRepository */
    private $blogBRepository;

    public function __construct(blogBRepository $blogBRepo)
    {
        $this->blogBRepository = $blogBRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/blogBs",
     *      summary="Get a listing of the blogBs.",
     *      tags={"blogB"},
     *      description="Get all blogBs",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/blogB")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $blogBs = $this->blogBRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($blogBs->toArray(), 'Blog Bs retrieved successfully');
    }

    /**
     * @param CreateblogBAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/blogBs",
     *      summary="Store a newly created blogB in storage",
     *      tags={"blogB"},
     *      description="Store blogB",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="blogB that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/blogB")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/blogB"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateblogBAPIRequest $request)
    {
        $input = $request->all();

        $blogB = $this->blogBRepository->create($input);

        return $this->sendResponse($blogB->toArray(), 'Blog B saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/blogBs/{id}",
     *      summary="Display the specified blogB",
     *      tags={"blogB"},
     *      description="Get blogB",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of blogB",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/blogB"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var blogB $blogB */
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            return $this->sendError('Blog B not found');
        }

        return $this->sendResponse($blogB->toArray(), 'Blog B retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateblogBAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/blogBs/{id}",
     *      summary="Update the specified blogB in storage",
     *      tags={"blogB"},
     *      description="Update blogB",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of blogB",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="blogB that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/blogB")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/blogB"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateblogBAPIRequest $request)
    {
        $input = $request->all();

        /** @var blogB $blogB */
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            return $this->sendError('Blog B not found');
        }

        $blogB = $this->blogBRepository->update($input, $id);

        return $this->sendResponse($blogB->toArray(), 'blogB updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/blogBs/{id}",
     *      summary="Remove the specified blogB from storage",
     *      tags={"blogB"},
     *      description="Delete blogB",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of blogB",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var blogB $blogB */
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            return $this->sendError('Blog B not found');
        }

        $blogB->delete();

        return $this->sendSuccess('Blog B deleted successfully');
    }
}
