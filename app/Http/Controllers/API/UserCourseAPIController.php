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
        // $uc ;
        if(isset($request->input()['club_id'])){
            foreach($userCourses as $key => $val){
              $course = Course::find($val['course_id']);
             
              if ($course['club_id']==$request->input()['club_id']){
                $uc[]=$val;
              } 
            }
        }else{
            $uc=$userCourses->toArray();
        }

        // $userCourses->sortByDesc('classification');
       
        return $this->sendResponse(
            $uc,
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
    public function destroy($id, Request $request)
    {
        /**
         * Para cada user_course 
         * elimino el couse
         * checo al club que pertenece este user_course 
         * traigo todos los courses que tiene el club 
         * checo los user_course que pertenecen a los courses del club con wherein course_id, courses->ids 
         * 
         * si hay mas de uno no se elimana el club 
         * si es 0 elimino el club del paso 3
         */
        if($id!=0){
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
        }else {
            $ids = $request->all();
            foreach ($ids as $key => $id) {
                
                $userCourse = $this->userCourseRepository->find($id);
                if (empty($userCourse)) {
                    return $this->sendError(
                        __('messages.not_found', ['model' => __('models/userCourses.singular')])
                    );
                }
                $uc =$userCourse;
                
                $userCourse->delete();
                $course = Course::where('id', $uc['course_id'])->first();
                
                $courses = Course::where('club_id', $course['club_id'])->get();
 
                $userCourses = UserCourse::whereIn('course_id',array_column($courses->toArray(), 'id') )->where('user_id',$uc['user_id'])->get();
                if(count($userCourses)==0){
                    $userClub = UserClub::where('club_id', $course['club_id'])->where('user_id',$uc['user_id']);
                    $userClub->delete();
                }
                
            }
            return $this->sendResponse(
                array("data"=> $ids),
                __('messages.deleted', ['model' => __('models/userCourses.singular')])
            );
        }
        
    }
}
