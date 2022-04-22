<?php

namespace App\Providers;
use App\Models\Bet;
use App\Models\Tee;
use App\Models\TeeColor;
use App\Models\Course;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Club;
use App\Models\State;
use App\Models\Country;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['bet_raya_puntos.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_greens.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_skins.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_match_parejas.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_rompe_handicaps.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_stablefords.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_medal_plays.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bet_match_individuals.fields'], function ($view) {
            $betItems = Bet::pluck('name','id')->toArray();
            $view->with('betItems', $betItems);
        });
        View::composer(['bets.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_groups.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_groups.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_hole_raitings.fields','user_hole_raitings.table', 'user_hole_raitings.show_fields'], function ($view) {
            $userItems = User::where('enabled',1)->pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_handicap_indices.fields','user_handicap_indices.table', 'user_handicap_indices.show_fields'], function ($view) {
            $userItems = User::where('enabled',1)->pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_players.fields','user_players.table', 'user_players.show_fields'], function ($view) {
            $userItems = User::where('enabled',1)->pluck('alias','id')->toArray();
            $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            $view->with([ 'userItems'=> $userItems,  'tee_colorItems'=> $tee_colorItems]);
        });
        View::composer(['user_courses.fields','user_courses.table', 'user_courses.show_fields'], function ($view) {
            $courseItems = Course::where('enabled',1)->pluck('alias','id')->toArray();
            $userItems = User::where('enabled',1)->pluck('alias','id')->toArray();
            $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            $tees = Tee::where('enabled',1)->get()->toArray();
            foreach ($tees as $key => $teeItem) {
                $course = $courseItems[$teeItem['course_id']]??'';
                $color = $tee_colorItems[$teeItem['teecolor_id']]??'';
                $teeItems[$teeItem['id']] = $course. ' - '. $color.' - '.$teeItem['gender'] ;
            }
            $view->with([ 'userItems'=> $userItems, 'courseItems'=> $courseItems, 'teeItems'=> $teeItems]);
        });
        View::composer(['user_clubs.fields','user_clubs.table', 'user_clubs.show_fields'], function ($view) {
            $clubItems = Club::where('enabled',1)->pluck('name','id')->toArray();
            $userItems = User::where('enabled',1)->pluck('alias','id')->toArray();
            $view->with([ 'userItems'=> $userItems, 'clubItems'=> $clubItems]);
        });
        View::composer(['holes.fields','holes.table', 'holes.show_fields'], function ($view) {
            // $teeItems = Tee::where('enabled',1)->get()->toArray();
            $courseItems = Course::where('enabled',1)->pluck('alias','id')->toArray();
            // $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            // foreach ($teeItems as $key => $teeItem) {
            //     $teeItems[$key] = $courseItems[$teeItem['course_id']]??''. ' - '. $tee_colorItems[$teeItem['teecolor_id']]??''.' '.$teeItem['gender'] ;
            // }
            $view->with([ 'courseItems'=> $courseItems]);
        });
        View::composer(['course_tee_defaults.fields','course_tee_defaults.table', 'course_tee_defaults.show_fields'], function ($view) {
            $courseItems = Course::where('enabled',1)->pluck('alias','id')->toArray();
            $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            $tees = Tee::where('enabled',1)->get()->toArray();
            foreach ($tees as $key => $teeItem) {
                $course = $courseItems[$teeItem['course_id']]??'';
                $color = $tee_colorItems[$teeItem['teecolor_id']]??'';
                $teeItems[$teeItem['id']] = $course. ' - '. $color.' - '.$teeItem['gender'] ;
            }
            $view->with(['courseItems'=>$courseItems, 'teeItems'=> $teeItems,'tees'=> $tees,'tee_colorItems'=> $tee_colorItems]);
        });
        View::composer(['tees.fields','tees.table', 'tees.show_fields'], function ($view) {
            $courseItems = Course::where('enabled',1)->pluck('alias','id')->toArray();
            $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            $view->with(['courseItems'=>$courseItems, 'tee_colorItems'=> $tee_colorItems]);
        });
        View::composer(['courses.fields','courses.table', 'courses.show_fields'], function ($view) {
            $clubItems = Club::where('enabled',1)->pluck('name','id')->toArray();
            $view->with('clubItems', $clubItems);
        });
        View::composer(['users.fields'], function ($view) {
            $roleItems = Role::pluck('name','name')->toArray();
            $view->with('roleItems', $roleItems);
        });
        View::composer(['users.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['users.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['clubs.fields', 'clubs.table', 'clubs.show_fields'], function ($view) {
            $countryItems = Country::where('enabled',1)->pluck('name','id')->toArray();
            $stateItems = State::where('enabled',1)->pluck('name','id')->toArray();
            $view->with(['countryItems'=>$countryItems, 'stateItems'=> $stateItems]);
        });
        View::composer(['states.fields', 'states.table', 'states.show_fields'], function ($view) {
            $countryItems = Country::where('enabled',1)->pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        
        
        //
    }
}