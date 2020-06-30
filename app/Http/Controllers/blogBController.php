<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateblogBRequest;
use App\Http\Requests\UpdateblogBRequest;
use App\Repositories\blogBRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class blogBController extends AppBaseController
{
    /** @var  blogBRepository */
    private $blogBRepository;

    public function __construct(blogBRepository $blogBRepo)
    {
        $this->blogBRepository = $blogBRepo;
    }

    /**
     * Display a listing of the blogB.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $blogBs = $this->blogBRepository->all();

        return view('blog_bs.index')
            ->with('blogBs', $blogBs);
    }

    /**
     * Show the form for creating a new blogB.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog_bs.create');
    }

    /**
     * Store a newly created blogB in storage.
     *
     * @param CreateblogBRequest $request
     *
     * @return Response
     */
    public function store(CreateblogBRequest $request)
    {
        $input = $request->all();

        $blogB = $this->blogBRepository->create($input);

        Flash::success('Blog B saved successfully.');

        return redirect(route('blogBs.index'));
    }

    /**
     * Display the specified blogB.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            Flash::error('Blog B not found');

            return redirect(route('blogBs.index'));
        }

        return view('blog_bs.show')->with('blogB', $blogB);
    }

    /**
     * Show the form for editing the specified blogB.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            Flash::error('Blog B not found');

            return redirect(route('blogBs.index'));
        }

        return view('blog_bs.edit')->with('blogB', $blogB);
    }

    /**
     * Update the specified blogB in storage.
     *
     * @param int $id
     * @param UpdateblogBRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateblogBRequest $request)
    {
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            Flash::error('Blog B not found');

            return redirect(route('blogBs.index'));
        }

        $blogB = $this->blogBRepository->update($request->all(), $id);

        Flash::success('Blog B updated successfully.');

        return redirect(route('blogBs.index'));
    }

    /**
     * Remove the specified blogB from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $blogB = $this->blogBRepository->find($id);

        if (empty($blogB)) {
            Flash::error('Blog B not found');

            return redirect(route('blogBs.index'));
        }

        $this->blogBRepository->delete($id);

        Flash::success('Blog B deleted successfully.');

        return redirect(route('blogBs.index'));
    }
}
