@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-5">
                <div class="card">
                    <div class="card-header" style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">Fill All The Form To Apply For Annual Leave</div>
                    <div class="card-body">
                        <div class="p-5">
{{--                            <form method="POST" action="{{ route('Annual-leave-application.store') }}">--}}
                                {!! Form::open(['method'=>'POST','action'=>['AnnualLeaveController@store'],'onsubmit'=>"return confirm('Are you sure you want to post');"] ) !!}
                                @csrf

                                <div class="form-group @error('user_id')  @enderror row">
                                    <div class="col-md-2">
                                        <label for="user_id" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                            <option value="">--Choose Option--</option>
                                            @foreach($users as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Job Title') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="title_id" id="title_id" class="form-control @error('title_id') is-invalid @enderror">
                                            <option value="">--Choose Option--</option>
                                            @foreach($jobs as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('title_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="name" class="col-form-label text-md-right">{{ __('Department') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                            <option value="">--Choose Option--</option>
                                            @foreach($department as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="applyfor" class="col-form-label text-md-right">{{ __('Days Applying For') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input id="applyfor" type="number" class="form-control @error('applyfor') is-invalid @enderror" name="applyfor" value="{{ old('applyfor') }}" >
                                        @error('applyfor')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">
                                        {!! Form::label('year','Year',['class'=>'control-label']) !!}
                                    </div>
                                    <div class="col-md-7">
                                        <input id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"  autocomplete="year" autofocus>
                                        @error('year')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="effectiveDate" class="col-form-label text-md-right">{{ __('Effective') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input id="effectiveDate" type="date" class="form-control @error('effectiveDate') is-invalid @enderror" name="effectiveDate" value="{{ old('effectiveDate') }}"  autocomplete="effectiveDate" autofocus>
                                        @error('effectiveDate')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="userSignatureId" class="col-form-label text-md-right">{{ __('Signature') }}</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="signatureID" id="signatureID" class="form-control @error('signatureID') is-invalid @enderror">
                                            <option value="">--Choose Option--</option>
                                            @foreach($sign as $item)
                                                <option value="{{$item->sign_id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('signatureID')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Click To Apply') }}
                                        </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
