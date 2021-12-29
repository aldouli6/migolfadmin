<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserClubAPIRequest;
use App\Http\Requests\API\UpdateUserClubAPIRequest;
use App\Models\UserClub;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Tee;
use App\Repositories\UserClubRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class UserClubController
 * @package App\Http\Controllers\API
 */

class UserClubAPIController extends AppBaseController
{
    /** @var  UserClubRepository */
    private $userClubRepository;

    public function __construct(UserClubRepository $userClubRepo)
    {
        $this->userClubRepository = $userClubRepo;
    }

    /**
     * Display a listing of the UserClub.
     * GET|HEAD /userClubs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userClubs = $this->userClubRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $userClubs->toArray(),
            __('messages.retrieved', ['model' => __('models/userClubs.plural')])
        );
    }

    /**
     * Store a newly created UserClub in storage.
     * POST /userClubs
     *
     * @param CreateUserClubAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserClubAPIRequest $request)
    {
        /** 
         * Objeto Ideal para asignar un club, si lleva campo sede se agrega el course id
         *  {
         *   "user_id":14,
         *   "club_id":3,
         *  "course_id":7,
         *  "classification":"1"
         *  }
        */
        $input = $request->all();
        DB::beginTransaction();
        $userClub= UserClub::updateOrCreate(
            [
                'user_id'=>$input['user_id'],
                'club_id'=>$input['club_id'],
                
            ],
            [
                'classification' =>$input['classification'],
            ]
        );
        $courses = Course::where('club_id', $input['club_id'])->get();
        if (empty($courses)) {
            DB::rollBack();
            // $userClub->delete();
            return response(['success'=>false, 'message'=>'No hay campos en este club, inténtelo después' ]);
            // return $this->sendError('No hay campos en este club, inténtelo después');
        }
        foreach ($courses as $key => $course){
            $dMale = Tee::where('course_id', $course['id']) ->where('gender', 'M')->where('default', 1)->where('enabled', 1)->first();
            $dFeMale = Tee::where('course_id', $course['id']) ->where('gender', 'F')->where('default', 1)->where('enabled', 1)->first();
            // dd($dMale, $dFeMale);
            $courses[$key]['tee_default_male']=(is_null($dMale))?null:$dMale->toArray()['id'];
            $courses[$key]['tee_default_female']=(is_null($dFeMale))?null:$dFeMale->toArray()['id'];
        }
        $coursesDM = array_column( $courses->toArray() , 'tee_default_male');
        if (count(array_filter($coursesDM)) != count($coursesDM)){
            DB::rollBack();
            // $userClub->delete();
            return response(['success'=>false, 'message'=>'Algún campo en el club no tiene salida default masculina' ]);
            // return $this->sendError('Algún campo en el club no tiene salida default masculina');
        }
        $coursesDF = array_column( $courses->toArray() , 'tee_default_female');
        if (count(array_filter($coursesDF)) != count($coursesDF)){
            DB::rollBack();
            // $userClub->delete();
            return response(['success'=>false, 'message'=>'Algún campo en el club no tiene salida default femenina' ]);
            // return $this->sendError('Algún campo en el club no tiene salida default femenina');
        }  

        $userClub=$userClub->toArray();
        $vueltas= 0;
        foreach ($courses as $key => $course){
            if(isset($input['course_id']))
                $clasi =($input['course_id']==$course['id'])?'1':'3';
            else{
                $clasi=($vueltas==0)? $input['classification']:'3';
                $vueltas++;
            }
            $userCourse= UserCourse::updateOrCreate(
                [
                    'user_id'=>$input['user_id'],
                    'course_id'=>$course['id'],
                ],
                [
                    'classification' =>$clasi,
                    'tee_default_male'=>$course['tee_default_male'],
                    'tee_default_female'=>$course['tee_default_female']

                ]
            );

            // $userClub['userCourses'][$course['id']] = $userCourse;
        }
        $call = new CallController;
        $uc = $call->call('/api/miscampos/'.$input['user_id'].'?club_id='.$input['club_id'],$request->bearerToken(),'GET' );
        $userClub['userCourses'] = $uc['userCourses'];
        DB::commit();
        return $this->sendResponse(
            $userClub,
            __('messages.saved', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Display the specified UserClub.
     * GET|HEAD /userClubs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }

        return $this->sendResponse(
            $userClub->toArray(),
            __('messages.retrieved', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Update the specified UserClub in storage.
     * PUT/PATCH /userClubs/{id}
     *
     * @param int $id
     * @param UpdateUserClubAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserClubAPIRequest $request)
    {
        $input = $request->all();
        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }
        if($input['classification'] == '1')
            $ud= UserClub::where(['user_id' => $input['user_id'] , 'classification'=>'1'])->first()->update(['classification' => '2']);

        $userClub = $this->userClubRepository->update($input, $id);
        return $this->sendResponse(
            $userClub->toArray(),
            __('messages.updated', ['model' => __('models/userClubs.singular')])
        );
    }

    /**
     * Remove the specified UserClub from storage.
     * DELETE /userClubs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserClub $userClub */
        $userClub = $this->userClubRepository->find($id);

        if (empty($userClub)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userClubs.singular')])
            );
        }

        $userClub->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/userClubs.singular')])
        );
    }
}
