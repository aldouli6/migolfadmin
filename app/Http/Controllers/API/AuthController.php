<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserClub;
use App\Models\UserCourse;
use App\Models\Course;
use App\Models\Club;
use App\Models\UserHandicapIndex;

class AuthController extends  AppBaseController
{
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), array(
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alias' => ['required', 'string',  'max:255', 'unique:users'],
            'phone' => ['required', 'string',  'max:255', 'unique:users'],
            'phone_code' => ['required', 'string',  'max:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ));
        if ($validator->fails()) {
            $messages = $validator->messages();
            $result='';
            $cuenta=0;
            foreach ($messages->all() as $message){
                $result.=$message.',';
                $cuenta++;
            }
            return response(['success'=>false, 'message'=>$result , 'cuenta'=>$cuenta]);
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['privacy_notice'] = $input['terms'];
            $user = User::create($input);

        //Inserta el handicap
        if(isset($input['handicap_index'])){
            $userHandicapIndex['handicap_index']=$input['handicap_index'];
            $userHandicapIndex['date_handicap_index']= date("Y-m-d H:i:s");
        }
        $userHandicapIndex['ghin']=($input['ghin']!="")?$input['ghin']:null;
        if (isset($userHandicapIndex['handicap_index'])) {
            $userHandicapIndex['player_id']=$user->id;
            UserHandicapIndex::create($userHandicapIndex);
        }
        //Inserta el club
        if($input['club_id']!=0){
            $userClub['club_id']=$input['club_id'];
        }else{
            $club = Club::where('state_id', $input['state_id'])->first();
            $userClub['club_id'] = $club->id??null;
        }
        if($userClub['club_id']!=0){
            $userClub['user_id']=$user->id;;
            $userClub['classification']='1';
            $res= UserClub::updateOrCreate(
                ['user_id'=>$user->id, 'classification'=>1],
                ['club_id'=>$userClub['club_id']]
            );
        }
        //Inserta el course
        if($input['course_id']!=0){
            $course_id=$input['course_id'];
        }elseif($input['club_id']!=0){
            $course= Course::where('club_id',$input['club_id'])->first();
            $course_id=$course->id??null;
        }else{
            $club = Club::where('state_id', $input['state_id'])->first();
            if($club->id!=null){
                $course= Course::where('club_id',$club->id)->first();
                $course_id=$course->id??null;
            }  
        }
        if($course_id!=0){
            $res= UserCourse::updateOrCreate(
                ['user_id'=>$user->id],
                [
                    'course_id'=>$course_id,
                    'tee_default_male'=>($input['tee_male_id']==0)?null:$input['tee_male_id'],
                    'tee_default_female'=>($input['tee_female_id']==0)?null:$input['tee_female_id'],
                ]
            );
        }

        
        

        if($input['role'])
            $user->assignRole($input['role']);
        // $user->sendEmailVerificationNotification();

        return response([ 'success'=>true,'data' => $user]);
        }
        
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return $this->sendError(
                'Credenciales Inválidas', 200
            );
        } 
        $user =auth()->user();
        if($user->email_verified_at==''){
            return $this->sendError(
                'Usuario no verificado', 200
            );
        }
        if(!$user->hasRole(['usuario'])){
            return $this->sendError(
                'Usuario sin permisos para esta aplicación', 200
            );
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $user['access_token']  = $accessToken;
        return response(['success'=>true,'data' => $user]);

    }
    public function logout()
    {        
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response(['message' => 'Successfully logged out']);
    }
}
