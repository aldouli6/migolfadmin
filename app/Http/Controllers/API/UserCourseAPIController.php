<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserCourseAPIRequest;
use App\Http\Requests\API\UpdateUserCourseAPIRequest;
use App\Models\UserCourse;
use App\Models\Course;
use App\Models\UserClub;
use App\Repositories\UserCourseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserCourseController
 * @package App\Http\Controllers\API
 */

class UserCourseAPIController extends AppBaseController
{
    /** @var  UserCourseRepository */
    private $userCourseRepository;

    public function __construct(UserCourseRepository $userCourseRepo)
    {
        $this->userCourseRepository = $userCourseRepo;
    }

    /**
     * Display a listing of the UserCourse.
     * GET|HEAD /userCourses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userCourses = $this->userCourseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $userCourses->sortByDesc('classification');
        return $this->sendResponse(
            $userCourses->toArray(),
            __('messages.retrieved', ['model' => __('models/userCourses.plural')])
        );
    }

    /**
     * Store a newly created UserCourse in storage.
     * POST /userCourses
     *
     * @param CreateUserCourseAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserCourseAPIRequest $request)
    {
        $input = $request->all();

        $userCourse = $this->userCourseRepository->create($input);

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.saved', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Display the specified UserCourse.
     * GET|HEAD /userCourses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.retrieved', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Update the specified UserCourse in storage.
     * PUT/PATCH /userCourses/{id}
     *
     * @param int $id
     * @param UpdateUserCourseAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserCourseAPIRequest $request)
    {

        $call = new CallController;
        $input = $request->all();

        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }
        if($input['classification'] == '1'){
            $uc= UserCourse::where(['user_id' => $input['user_id'] , 'classification'=>'1'])->first();//->update(['classification' => '2']);
            if($uc){
                $uc->update(['classification' => '2']);
                $crse = Course::find($input['course_id']);
                $uclb = UserClub::where(['user_id' => $input['user_id'] , 'club_id'=>$crse['club_id']])->first();
                $r = $call->call('/api/user_clubs/'.$uclb['id'],$request->bearerToken(),'PUT',["user_id"=>$input['user_id'], "club_id"=>$crse['club_id'], "classification"=>"1"] );
                // dd($uclb);
            }
            
        }
            
        $userCourse = $this->userCourseRepository->update($input, $id);

        return $this->sendResponse(
            $userCourse->toArray(),
            __('messages.updated', ['model' => __('models/userCourses.singular')])
        );
    }

    /**
     * Remove the specified UserCourse from storage.
     * DELETE /userCourses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserCourse $userCourse */
        $userCourse = $this->userCourseRepository->find($id);

        if (empty($userCourse)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userCourses.singular')])
            );
        }

        $userCourse->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userCourses.singular')])
        );
    }
}
