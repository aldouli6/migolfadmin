<?php

namespace App\Providers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Start;
use App\Models\StartColor;
use App\Models\Field;
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
        View::composer(['user_players.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['user_players.fields'], function ($view) {
            $startItems = Start::pluck('startcolor_id','id')->toArray();
            $view->with('startItems', $startItems);
        });
        View::composer(['user_players.fields'], function ($view) {
            $userItems = User::pluck('alias','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['user_fields.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['user_fields.fields'], function ($view) {
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
        View::composer(['field_start_defaults.fields'], function ($view) {
            $startItems = Start::pluck('startcolor_id','id')->toArray();
            $view->with('startItems', $startItems);
        });
        View::composer(['field_start_defaults.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['holes.fields'], function ($view) {
            $startItems = Start::pluck('startcolor_id','id')->toArray();
            $view->with('startItems', $startItems);
        });
        View::composer(['holes.fields'], function ($view) {
            $startItems = Start::pluck('startcolor_id','id')->toArray();
            $view->with('startItems', $startItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $start_colorItems = StartColor::pluck('name','id')->toArray();
            $view->with('start_colorItems', $start_colorItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $start_colorItems = StartColor::pluck('name','id')->toArray();
            $view->with('start_colorItems', $start_colorItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $start_colorItems = StartColor::pluck('name','id')->toArray();
            $view->with('start_colorItems', $start_colorItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['users.fields'], function ($view) {
            $roleItems = Role::pluck('name','name')->toArray();
            $view->with('roleItems', $roleItems);
        });
        View::composer(['users.fields'], function ($view) {
            $startItems = Start::pluck('startcolor_id','id')->toArray();
            $view->with('startItems', $startItems);
        });
        View::composer(['users.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['users.fields'], function ($view) {
            $stateItems = State::pluck('name','id')->toArray();
            $view->with('stateItems', $stateItems);
        });
        View::composer(['users.fields'], function ($view) {
            $countryItems = Country::pluck('name','id')->toArray();
            $view->with('countryItems', $countryItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $start_colorItems = StartColor::pluck('name','id')->toArray();
            $view->with('start_colorItems', $start_colorItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $start_colorItems = StartColor::pluck('name','id')->toArray();
            $view->with('start_colorItems', $start_colorItems);
        });
        View::composer(['starts.fields'], function ($view) {
            $fieldItems = Field::pluck('alias','id')->toArray();
            $view->with('fieldItems', $fieldItems);
        });
        View::composer(['fields.fields'], function ($view) {
            $clubItems = Club::pluck('name','id')->toArray();
            $view->with('clubItems', $clubItems);
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