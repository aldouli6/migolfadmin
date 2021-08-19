<?php

namespace App\Providers;
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
        View::composer(['user_courses.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_hole_raitings.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_handicap_indices.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_scores.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['user_courses.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_clubs.fields'], function ($view) {
            $clubItems = Club::pluck('name','id')->toArray();
            $view->with('clubItems', $clubItems);
        });
        View::composer(['user_clubs.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_players.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['user_players.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['user_players.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['holes.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['course_tee_defaults.fields'], function ($view) {
            $teeItems = Tee::pluck('teecolor_id','id')->toArray();
            $view->with('teeItems', $teeItems);
        });
        View::composer(['course_tee_defaults.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['tees.fields'], function ($view) {
            $tee_colorItems = TeeColor::pluck('name','id')->toArray();
            $view->with('tee_colorItems', $tee_colorItems);
        });
        View::composer(['tees.fields'], function ($view) {
            $courseItems = Course::pluck('alias','id')->toArray();
            $view->with('courseItems', $courseItems);
        });
        View::composer(['courses.fields'], function ($view) {
            $clubItems = Club::pluck('name','id')->toArray();
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
        View::composer(['clubs.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['clubs.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['clubs.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['clubs.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['clubs.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['clubs.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['states.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        //
    }
}