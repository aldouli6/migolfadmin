<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserPlayerAPIRequest;
use App\Http\Requests\API\UpdateUserPlayerAPIRequest;
use App\Models\UserPlayer;
use App\Models\User;
use App\Models\UserHandicapIndex;
use App\Models\UserHoleRaiting;
use App\Repositories\UserPlayerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class UserPlayerController
 * @package App\Http\Controllers\API
 */

class UserPlayerAPIController extends AppBaseController
{
    /** @var  UserPlayerRepository */
    private $userPlayerRepository;

    public function __construct(UserPlayerRepository $userPlayerRepo)
    {
        $this->userPlayerRepository = $userPlayerRepo;
    }

    /**
     * Display a listing of the UserPlayer.
     * GET|HEAD /userPlayers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $userPlayers = $this->userPlayerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        foreach ($userPlayers as $userPlayer) {
            $userPlayer['player'] =User::find($userPlayer['player_id']); 
            $userPlayer['handicap'] = UserHandicapIndex::where('player_id',$userPlayer['player_id'])->first();
            $userPlayer['rating'] = UserHoleRaiting::where('player_id',$userPlayer['player_id'])->first();
        }
        return $this->sendResponse(
            $userPlayers->toArray(),
            __('messages.retrieved', ['model' => __('models/userPlayers.plural')])
        );
    }

     function getName($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }

    /**
     * Store a newly created UserPlayer in storage.
     * POST /userPlayers
     *
     * @param CreateUserPlayerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserPlayerAPIRequest $request)
    {
    try{
        $call = new CallController;
        $input = $request->all();
        //Cree un usuariop
        $pass = $this->getName(10);
        // dd($pass);
        $input_user = [
            "name"=>$input['name'],
            "password"=>$pass,
            "password_confirmation"=>$pass,
            "email"=>$input['email'],
            "enabled"=>1,
            "alias"=>$input['alias'],
            "lastname"=>$input['lastname'],
            "gender"=>$input['gender'],
            "country_id"=>$input['country_id'],
            "state_id"=>$input['state_id'],
            "phone"=>$input['phone'],
            "phone_code"=>$input['phone_code'],
            "role"=>'jugador',
        ];
        DB::beginTransaction();
        $user = $call->call('/api/users',$request->bearerToken(),'POST',$input_user );
        if (isset($user['errors'])){
            DB::rollBack();
            return response(array_merge(['success'=>false], $user));
        }

        $input_uplayer =[
            "user_id"=>$input['user_id'],
            "player_id"=>$user['id'],
            "frequency"=>$input['frequency'],
            "tee_color_id"=>$input['tee_color_id'],
        ];
        $userPlayer = $this->userPlayerRepository->create($input_uplayer);

        if (isset($userPlayer['errors'])){
            DB::rollBack();
            return response(array_merge(['success'=>false], $userPlayer));
        }
        //create my user handicap index
        $input_hcp=[
            "player_id"=>$user['id'],
            "handicap_index"=>$input['handicap_index'],
            "date_handicap_index"=>date("Y-m-d H:i:s")
        ];
        $user_hcp = $call->call('api/user_handicap_indices',$request->bearerToken(),'POST',$input_hcp );
        if (isset($user_hcp['errors'])){
            DB::rollBack();
            return response(array_merge(['success'=>false], $user_hcp));
        }
        //create my user hole rating
        $input_rating=[
            "player_id"=>$user['id'],
            "hole_raiting_type"=>$input['hole_raiting_type'],
            "hole_raitinig"=>$input['hole_raitinig'],
        ];
        $user_rating = $call->call('api/user_hole_raitings',$request->bearerToken(),'POST',$input_rating );
        if (isset($user_rating['errors'])){
            DB::rollBack();
            return response(array_merge(['success'=>false], $user_rating));
        }
        

        DB::commit();
        return $this->sendResponse(
            $userPlayer->toArray(),
            __('messages.saved', ['model' => __('models/userPlayers.singular')])
        );
    } catch (\Throwable $e) {
        DB::rollBack();
        $res['success']=false;
        $res['data']=[];
        $res['message']=$e->getMessage();
        return response($res);
    }
    }

    /**
     * Display the specified UserPlayer.
     * GET|HEAD /userPlayers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserPlayer $userPlayer */
        $userPlayer = $this->userPlayerRepository->find($id);

        if (empty($userPlayer)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/userPlayers.singular')])
            );
        }

        return $this->sendResponse(
            $userPlayer->toArray(),
            __('messages.retrieved', ['model' => __('models/userPlayers.singular')])
        );
    }

    /**
     * Update the specified UserPlayer in storage.
     * PUT/PATCH /userPlayers/{id}
     *
     * @param int $id
     * @param UpdateUserPlayerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserPlayerAPIRequest $request)
    {
        try{
            $call = new CallController;
            $input = $request->all();

            $input_user = [
                "name"=>$input['name'],
                "email"=>$input['email'],
                "alias"=>$input['alias'],
                "lastname"=>$input['lastname'],
                "gender"=>$input['gender'],
                "country_id"=>$input['country_id'],
                "state_id"=>$input['state_id'],
                "phone"=>$input['phone'],
                "phone_code"=>$input['phone_code'],
                "user_id"=>$input['player_id']
            ];

            DB::beginTransaction();
            $user = $call->call('/api/users/'.$input['player_id'],$request->bearerToken(),'PUT',$input_user );
            if (isset($user['errors'])){
                DB::rollBack();
                return response(array_merge(['success'=>false], $user));
            }
            $input_hcp=[
                "handicap_index"=>$input['handicap_index'],
                "date_handicap_index"=>date("Y-m-d H:i:s")
            ];
            $user_hcp = $call->call('api/user_handicap_indices/'.$input['handicap_id'],$request->bearerToken(),'PUT',$input_hcp );
            if (isset($user_hcp['errors'])){
                DB::rollBack();
                return response(array_merge(['success'=>false], $user_hcp));
            }
            if(isset($input['hole_rating_id'])){
                $input_rating=[
                    "hole_raiting_type"=>$input['hole_raiting_type'],
                    "hole_raitinig"=>$input['hole_raitinig'],
                ];
                $user_rating = $call->call('api/user_hole_raitings/'.$input['hole_rating_id'],$request->bearerToken(),'PUT',$input_rating );
                if (isset($user_rating['errors'])){
                    DB::rollBack();
                    return response(array_merge(['success'=>false], $user_rating));
                }
            }
            

            $input_uplayer =[
                "frequency"=>$input['frequency'],
                "tee_color_id"=>$input['tee_color_id'],
            ];

            /** @var UserPlayer $userPlayer */
            $userPlayer = $this->userPlayerRepository->find($id);

            if (empty($userPlayer)) {
                DB::rollBack();
                return $this->sendError(
                    __('messages.not_found', ['model' => __('models/userPlayers.singular')])
                );
            }

            DB::commit();
            $userPlayer = $this->userPlayerRepository->update($input_uplayer, $id);

            // dd($userPlayer);
            return $this->sendResponse(
                ['userPlayer'=>$userPlayer->toArray(), "user"=>$user],
                __('messages.updated', ['model' => __('models/userPlayers.singular')])
            );
        } catch (\Throwable $e) {
            DB::rollBack();
            $res['success']=false;
            $res['data']=[];
            $res['message']=$e->getMessage();
            return response($res);
        }
        
    }

    /**
     * Remove the specified UserPlayer from storage.
     * DELETE /userPlayers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        if($id!=0){
            /** @var UserPlayer $userPlayer */
            $userPlayer = $this->userPlayerRepository->find($id);

            if (empty($userPlayer)) {
                return $this->sendError(
                    __('messages.not_found', ['model' => __('models/userPlayers.singular')])
                );
            }

            $userPlayer->delete();

            return $this->sendResponse(
                $id,
                __('messages.deleted', ['model' => __('models/userPlayers.singular')])
            );
        }else{
            $ids = $request->all();
            $userPlayers = UserPlayer::whereIn('player_id', $ids);
            // dd($userPlayers->get());
            if (empty($userPlayers->get()->toArray())) {
                return $this->sendError(
                    __('messages.not_found', ['model' => __('models/userPlayers.singular')])
                );
            }
            $userPlayers->delete();
            return $this->sendResponse(
                array("data" =>$ids),
                __('messages.deleted', ['model' => __('models/userPlayers.singular')])
            );
        }
    }
}
