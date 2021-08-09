@extends('layouts.app')
@section('title')
     @lang('models/userScores.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/userScores.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('userScores.create')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('user_scores.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection



