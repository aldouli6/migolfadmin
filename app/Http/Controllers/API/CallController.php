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
    public function clubs(Request $request, $user){
        try{
            $data['userClubs'] = $this->call('/api/user_clubs?user_id='.$user,$request->bearerToken());
            foreach ($data['userClubs'] as $keyClub => $userClub) {
                $courses= $this->call('/api/courses?club_id='.$userClub['club_id'],$request->bearerToken());
                
                foreach ($courses as $keyc => $course) {
                    // dd($course);
                    $data['userClubs'][$keyClub]['userCourses'][$course['id']] = $this->call('/api/user_courses?course_id='.$course['id'].'&user_id='.$user,$request->bearerToken());
                    
                    foreach ($data['userClubs'][$keyClub]['userCourses'][$course['id']] as $key => $usercourse) {
                        $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course'] = $this->call('/api/courses/'.$usercourse['course_id'],$request->bearerToken());
                        $countires = $this->call('/api/countries?enabled=1', null);
                        $found_key = array_search($data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['club']['country_id'], array_column($countires, 'id'));
                        $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['fount']=$found_key;
                        if(isset($countires[$found_key])){
                            $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['country'] = $countires[$found_key];
                            $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['state']  = $this->call('/api/states/'.$data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['club']['state_id'],$request->bearerToken());
                            $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['state'] = $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['state'][0]??null;
                        }else{
                            $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['country']=null;
                            $data['userClubs'][$keyClub]['userCourses'][$course['id']][$key]['course']['state']=null;
                        }
                    }
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
    public function campos(Request $request, $user){
        try{
            $user_data = $this->call('/api/users/'.$user,$request->bearerToken() );
            $data['country_id']=$country = $user_data['country_id'];
            $data['countries'] = $this->call('/api/countries?enabled=1',$request->bearerToken()); 
            $data['states'] = $this->call('/api/states/'.$country,$request->bearerToken());
            $data['clubs']=$this->call('/api/clubs',$request->bearerToken());
            $data['userClubs'] = $this->call('/api/user_clubs?user_id='.$user,$request->bearerToken());
            
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
    public function miscampos(Request $request, $user){
        try{
            $data['userCourses'] = $this->call('/api/user_courses?user_id='.$user,$request->bearerToken());
            foreach ($data['userCourses'] as $key => $usercourse) {
                $data['userCourses'][$key]['course'] = $this->call('/api/courses/'.$usercourse['course_id'],$request->bearerToken());
                $countires = $this->call('/api/countries?enabled=1', null);
                $found_key = array_search($data['userCourses'][$key]['course']['club']['country_id'], array_column($countires, 'id'));
                if(isset($countires[$found_key])){
                    $data['userCourses'][$key]['course']['country'] = $countires[$found_key];
                    $data['userCourses'][$key]['course']['state']  = $this->call('/api/states/'.$data['userCourses'][$key]['course']['club']['state_id'],$request->bearerToken());
                    $data['userCourses'][$key]['course']['state'] = $data['userCourses'][$key]['course']['state'][0]??null;
                }else{
                    $data['userCourses'][$key]['course']['country']=null;
                    $data['userCourses'][$key]['course']['state']=null;
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
