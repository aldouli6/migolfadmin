<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBetAPIRequest;
use App\Http\Requests\API\UpdateBetAPIRequest;
use App\Models\Bet;
use App\Models\BetGreen;
use App\Models\BetMatchIndividual;
use App\Models\BetMatchPareja;
use App\Models\BetMedalPlay;
use App\Models\BetRayaPunto;
use App\Models\BetRompeHandicap;
use App\Models\BetSkin;
use App\Models\BetStableford;
use Illuminate\Support\Facades\DB;
use App\Repositories\BetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BetController
 * @package App\Http\Controllers\API
 */

class BetAPIController extends AppBaseController
{
    /** @var  BetRepository */
    private $betRepository;

    public function __construct(BetRepository $betRepo)
    {
        $this->betRepository = $betRepo;
    }

    /**
     * Display a listing of the Bet.
     * GET|HEAD /bets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bets = $this->betRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        foreach ($bets as $bet) {
            $bet['green'] =BetGreen::where('bet_id', $bet['id'])->get(); 
            $bet['match_individual'] =BetMatchIndividual::where('bet_id', $bet['id'])->get(); 
            // dd($bet);
            $bet['match_pareja'] =BetMatchPareja::where('bet_id', $bet['id'])->get(); 
            $bet['medal_play'] =BetMedalPlay::where('bet_id', $bet['id'])->get(); 
            $bet['raya_punto'] =BetRayaPunto::where('bet_id', $bet['id'])->get(); 
            $bet['rompe_handicap'] =BetRompeHandicap::where('bet_id', $bet['id'])->get(); 
            $bet['skin'] =BetSkin::where('bet_id', $bet['id'])->get(); 
            $bet['stableford'] =BetStableford::where('bet_id', $bet['id'])->get(); 
        }
        return $this->sendResponse(
            $bets->toArray(),
            __('messages.retrieved', ['model' => __('models/bets.plural')])
        );
    }

    /**
     * Store a newly created Bet in storage.
     * POST /bets
     *
     * @param CreateBetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBetAPIRequest $request)
    {
        $call = new CallController;
        $input = $request->all();
        $bets = array('green','match_individual', 'match_pareja','medal_play',
        'raya_punto','rompe_handicap', 'skin', 'stableford');
        DB::beginTransaction();
        $bet = $this->betRepository->create($input);
        foreach ($bets as $key => $val) {
           
            $input[$val]['bet_id'] = $bet['id'];
            $_bet = $call->call('/api/bet_'.$val.'s',$request->bearerToken(),'POST',$input[$val] );
            
            if (isset($_bet['errors'])){
                // dd($_bet);
                DB::rollBack();
                $_bet['errors']['bet_type']=[$val];
                return response(array_merge(['success'=>false], $_bet));
            }
        }
        DB::commit();
        $full_bet = $call->call('/api/bets?id='.$bet['id'],$request->bearerToken(),'GET' );
        return $this->sendResponse(
            $full_bet,
            __('messages.saved', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Display the specified Bet.
     * GET|HEAD /bets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        return $this->sendResponse(
            $bet->toArray(),
            __('messages.retrieved', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Update the specified Bet in storage.
     * PUT/PATCH /bets/{id}
     *
     * @param int $id
     * @param UpdateBetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBetAPIRequest $request)
    {
        $call = new CallController;
        $input = $request->all();
        $bets = array('green','match_individual', 'match_pareja','medal_play',
        'raya_punto','rompe_handicap', 'skin', 'stableford');
        DB::beginTransaction();
        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        $bet = $this->betRepository->update($input, $id);
        foreach ($bets as $key => $val) {
           
            $input[$val]['bet_id'] = $bet['id'];
            $_bet = $call->call('/api/bet_'.$val.'s/'.$input[$val]['id'],$request->bearerToken(),'PUT',$input[$val] );
            // dd($_bet);
            if (isset($_bet['errors'])){
                // dd($_bet);
                DB::rollBack();
                $_bet['errors']['bet_type']=[$val];
                return response(array_merge(['success'=>false], $_bet));
            }
        }
        DB::commit();
        $full_bet = $call->call('/api/bets?id='.$bet['id'],$request->bearerToken(),'GET' );
        return $this->sendResponse(
            $bet->toArray(),
            __('messages.updated', ['model' => __('models/bets.singular')])
        );
    }

    /**
     * Remove the specified Bet from storage.
     * DELETE /bets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bet $bet */
        $bet = $this->betRepository->find($id);

        if (empty($bet)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/bets.singular')])
            );
        }

        $bet->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/bets.singular')])
        );
    }
}
