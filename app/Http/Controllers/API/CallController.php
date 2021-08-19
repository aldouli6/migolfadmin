<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CallController extends Controller{

    public function usuario(Request $request, $user){
        try{
            // dd($request->bearerToken());
            $data['user'] = $this->call('/api/users/'.$user,$request->bearerToken() );
            $data['countries'] = $this->call('/api/countries',$request->bearerToken());
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
