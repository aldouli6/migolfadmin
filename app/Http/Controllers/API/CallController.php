<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hole;
use Illuminate\Support\Facades\Route;

class CallController extends Controller{

    public function usuario(Request $request, $user){
        try{
            // dd($request->bearerToken());
            $data['user'] = $this->call('/api/users/'.$user,$request->bearerToken() );
            $data['countries'] = $this->call('/api/countries?enabled=1',$request->bearerToken());
            $data['states'] = $this->call('/api/states/'.$data['user']['country_id'],$request->bearerToken());
            $data['userHandicapIndex'] = $this->call('/api/user_handicap_indices?limit=1&player_id='.$user,$request->bearerToken());
            $data['userHandicapIndex'] =$data['userHandicapIndex'][0]??null;
            $res['success']=true;
            $res['data']=$data;
            return response($res);
        } catch (\Throwable $e) {
            $res['success']=false;
            $res['data']=[];
            $res['message']=$e->getMessage();
            return response($res);
        }
    }
    public function perfil(Request $request, $user){
        try{
            $data['user'] = $this->call('/api/users/'.$user,$request->bearerToken() );
            $data['userHandicapIndex'] = $this->call('/api/user_handicap_indices?limit=1&player_id='.$user,$request->bearerToken());
            $data['userHandicapIndex'] =$data['userHandicapIndex'][0]??null;
            $data['userCourses'] = $this->call('/api/user_courses?user_id='.$user,$request->bearerToken());
            foreach ($data['userCourses'] as $key => $usercourse) {
                $data['userCourses'][$key]['course'] = $this->call('/api/courses/'.$usercourse['course_id'],$request->bearerToken());
                $data['userCourses'][$key]['tees'] = $this->call('/api/tees?gender='.$data['user']['gender'].'&course_id='.$usercourse['course_id'],$request->bearerToken());
                if(isset($data['userCourses'][$key]['tees'][0])){
                    $holesTee = $this->call('/api/holes?tee_id='.$data['userCourses'][$key]['tees'][0]['id'],$request->bearerToken());
                    $data['userCourses'][$key]['course']['par']=array_sum( array_column($holesTee, 'par'));
                }else{
                    $data['userCourses'][$key]['course']['par']=0;
                }
            }
            $res['success']=true;
            $res['data']=$data;
            return response($res);
        } catch (\Throwable $e) {
            $res['success']=false;
            $res['data']=[];
            $res['message']=$e->getMessage();
            return response($res);
        }
    }

    function call($url, $token){
        $request = Request::create($url, 'GET');
        $request->headers->add(['Authorization' => "Bearer {$token}"]);
        $response = app()->handle($request);
        $responseBody = json_decode($response->getContent(), true);
        if($responseBody['success']){
            return $responseBody['data'];
        }else{
            return null;
        }
    }
}  
