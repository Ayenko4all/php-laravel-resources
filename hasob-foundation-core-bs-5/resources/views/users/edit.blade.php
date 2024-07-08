@extends('layouts.app')

@section('app_css')
@stop

@section('title_postfix')
Edit User
@stop

@section('page_title')
    User Detail
@stop

@section('page_title_subtext')
<a class="ms-1" href="{{ route('fc.users.index') }}">
    <i class="bx bx-chevron-left"></i> Back to users
</a>
@stop

@section('page_title_buttons')
    <a href="#" title="Edit" data-val='{{$edited_user->id}}' class='btn-edit-mdl-user-modal' data-toggle="tooltip">
        {!! Form::button('<i class="fa fa-edit zmdi zmdi-border-color txt-warning"></i>', ['type'=>'button']) !!}
    </a>
@stop

@section('content')
<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body p-4">

        <div class="card-title d-flex align-items-center">
            <div>
                <i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">User Details</h5>
        </div>

{{--        {!! dd($departments) !!}--}}
        @include('hasob-foundation-core::users.show_fields')

    </div>
</div>

@include('hasob-foundation-core::users.modal')

@stop

@push('page_scripts')
@endpush