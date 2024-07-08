<div class="d-flex flex-wrap" style="">
    <div class="col-sm-6 mt-4">
        <h5>Personal Detail</h5>
        <div id="div_offer_status" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('status', 'Status:', ['class'=>'control-label']) !!}
                <span id="spn_user_presence_status">
        @if (isset($edited_user->presence_status) && empty($edited_user->presence_status)==false)
                        {!! $edited_user->presence_status !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('full_name', 'Full Name:', ['class'=>'control-label']) !!}
                <span id="spn_user_full_name_label">
        @if (isset($edited_user->full_name) && empty($edited_user->full_name)==false)
                        {!! $edited_user->full_name !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('first_name', 'First Name:', ['class'=>'control-label']) !!}
                <span id="spn_user_first_name">
        @if (isset($edited_user->first_name) && empty($edited_user->first_name)==false)
                        {!! $edited_user->first_name !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('last_name', 'Last Name:', ['class'=>'control-label']) !!}
                <span id="spn_user_last_name">
        @if (isset($edited_user->last_name) && empty($edited_user->last_name)==false)
                        {!! $edited_user->last_name !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('middle_name', 'Middle Name:', ['class'=>'control-label']) !!}
                <span id="spn_user_middle_name">
        @if (isset($edited_user->middle_name) && empty($edited_user->middle_name)==false)
                        {!! $edited_user->middle_name !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('telephone', 'Telephone:', ['class'=>'control-label']) !!}
                <span id="spn_user_telephone">
        @if (isset($edited_user->telephone) && empty($edited_user->telephone)==false)
                        {!! $edited_user->telephone !!}
                    @else
                        N/A
                    @endif
        </span>
            </p>
        </div>

        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('email', 'Email:', ['class'=>'control-label']) !!}
                <span id="spn_user_email">
                    @if (isset($edited_user->email) && empty($edited_user->email)==false)
                        {!! $edited_user->email !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
        </div>
        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('title', 'Title:', ['class'=>'control-label']) !!}
                <span id="spn_user_title">
                    @if (isset($edited_user->title) && empty($edited_user->title)==false)
                        {!! $edited_user->title !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
        </div>
        <div id="div_offer_offer_title" class="col-sm-12 mb-10">
            <p>
                {!! Form::label('job_title', 'Email:', ['class'=>'control-label']) !!}
                <span id="spn_user_job_title">
                    @if (isset($edited_user->job_title) && empty($edited_user->job_title)==false)
                        {!! $edited_user->job_title !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
        </div>
    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Organization Detail</h5>
        @if(isset($edited_user->organization))
            <p>
                {!! Form::label('organization_org', 'Organization org:', ['class'=>'control-label']) !!}
                <span>
                    @if (isset($edited_user->organization->org))
                        {!! $edited_user->organization->org !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
            <p>
                {!! Form::label('organization_domain', 'Organization domain:', ['class'=>'control-label']) !!}
                <span>
                    @if (isset($edited_user->organization->domain))
                        {!! $edited_user->organization->domain !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
            <p>
                {!! Form::label('organization_url', 'Organization url:', ['class'=>'control-label']) !!}
                <span>
                    @if (isset($edited_user->organization->full_url))
                        {!! $edited_user->organization->full_url !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
        @else
            N/A
        @endif

    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Department Detail</h5>
        @if(isset($edited_user->department))
            <p>
                {!! Form::label('department_key', 'Key:', ['class'=>'control-label']) !!}
                <span>
                    @if (isset($edited_user->department->key))
                        {!! $edited_user->department->key !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
            <p>
                {!! Form::label('department_name', 'Name:', ['class'=>'control-label']) !!}
                <span>
                    @if (isset($edited_user->department->long_name))
                        {!! $edited_user->department->long_name !!}
                    @else
                        N/A
                    @endif
                </span>
            </p>
        @else
            N/A
        @endif
    </div>

    <div id="div_offer_offer_title" class="col-sm-6 mb-10 mt-4">
        <h5>Role Detail</h5>

        @if (isset($edited_user) && $edited_user->roles->isNotEmpty())
            @foreach($edited_user->roles as $role)
                <p>
                    {!! Form::label('role', 'Role Name:', ['class'=>'control-label']) !!}
                    <span>
                        @if (isset($role->name))
                            {!! $role->name !!}
                        @else
                            N/A
                        @endif
                    </span>
                </p>
            @endforeach
        @else
            N/A
        @endif
    </div>
</div>




