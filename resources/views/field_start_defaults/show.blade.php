@extends('layouts.app')
@section('title')
    @lang('models/fieldStartDefaults.singular')  @lang('crud.details') 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>@lang('models/fieldStartDefaults.singular') @lang('crud.details')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('fieldStartDefaults.index') }}"
                 class="btn btn-primary form-btn float-right">@lang('crud.back')</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('field_start_defaults.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection

