@extends('layouts.app')

@section('title_postfix')
    User Details
@stop

@section('page_title')
    User Details
@stop

@section('page_title_subtext')
    <a class="ml-10 mb-10" href="{{ route('fc.user.index') }}" style="font-size:11px;color:blue;">
        <i class="fa fa-angle-double-left"></i> Back to User List
    </a>
@stop

@section('page_title_buttons')
    <span class="float-end">
    <div class="float-end inline-block dropdown mb-15">
        <a href="#" data-val='{{$edited_user->id}}' class='btn btn-xs btn-primary btn-edit-mdl-user-modal'>
            <i class="icon wb-reply" aria-hidden="true"></i>Edit User
        </a>
    </div>
</span>
@stop

@section('content')
    <div class="card">
        <div class="card-wrapper collapse in">
            <div class="card-body">
                <div class="form-wrap">
                    <div class="row">
                        @include('hasob-foundation-core::users.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
