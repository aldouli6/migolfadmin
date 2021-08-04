<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClubAPIRequest;
use App\Http\Requests\API\UpdateClubAPIRequest;
use App\Models\Club;
use App\Repositories\ClubRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClubController
 * @package App\Http\Controllers\API
 */

class ClubAPIController extends AppBaseController
{
    /** @var  ClubRepository */
    private $clubRepository;

    public function __construct(ClubRepository $clubRepo)
    {
        $this->clubRepository = $clubRepo;
    }

    /**
     * Display a listing of the Club.
     * GET|HEAD /clubs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clubs = $this->clubRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $clubs->toArray(),
            __('messages.retrieved', ['model' => __('models/clubs.plural')])
        );
    }

    /**
     * Store a newly created Club in storage.
     * POST /clubs
     *
     * @param CreateClubAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClubAPIRequest $request)
    {
        $input = $request->all();

        $club = $this->clubRepository->create($input);

        return $this->sendResponse(
            $club->toArray(),
            __('messages.saved', ['model' => __('models/clubs.singular')])
        );
    }

    /**
     * Display the specified Club.
     * GET|HEAD /clubs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Club $club */
        $club = $this->clubRepository->find($id);

        if (empty($club)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/clubs.singular')])
            );
        }

        return $this->sendResponse(
            $club->toArray(),
            __('messages.retrieved', ['model' => __('models/clubs.singular')])
        );
    }

    /**
     * Update the specified Club in storage.
     * PUT/PATCH /clubs/{id}
     *
     * @param int $id
     * @param UpdateClubAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClubAPIRequest $request)
    {
        $input = $request->all();

        /** @var Club $club */
        $club = $this->clubRepository->find($id);

        if (empty($club)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/clubs.singular')])
            );
        }

        $club = $this->clubRepository->update($input, $id);

        return $this->sendResponse(
            $club->toArray(),
            __('messages.updated', ['model' => __('models/clubs.singular')])
        );
    }

    /**
     * Remove the specified Club from storage.
     * DELETE /clubs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Club $club */
        $club = $this->clubRepository->find($id);

        if (empty($club)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/clubs.singular')])
            );
        }

        $club->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/clubs.singular')])
        );
    }
}
