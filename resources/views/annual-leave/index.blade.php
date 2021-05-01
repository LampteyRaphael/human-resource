@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content" style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                    <div class="modal-header">
                        <div class="modal-title">
                            Welcome To Approval Form
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['method'=>'PUT','action'=>['AnnualLeaveController@update','wait'],'onsubmit'=>"return confirm('Are you sure you want to post');"] ) !!}
                            @csrf
                            <input type="hidden" id="ids" name="ids" />
                            <div class="form-group @error('user_id')  @enderror row">
                                <div class="col-md-3">
                                    <label for="user_id" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
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
                                <div class="col-md-3">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Job Title') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="title_id" id="title_id" class="form-control @error('title_id') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
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
                                <div class="col-md-3">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Department') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
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
                                <div class="col-md-3">
                                    <label for="applyfor" class="col-form-label text-md-right">{{ __('Days Applying For') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="applyfor" type="number" class="form-control @error('applyfor') is-invalid @enderror" name="applyfor" value="{{ old('applyfor') }}" required autocomplete="applyfor" autofocus>
                                    @error('applyfor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    {!! Form::label('year','Year',['class'=>'control-label']) !!}
                                </div>
                                <div class="col-md-7">
                                    <input id="year" type="text" class="form-control" name="year">
                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="effectiveDate" class="col-form-label text-md-right">{{ __('Effective') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="effectiveDate" type="date" class="form-control @error('effectiveDate') is-invalid @enderror" name="effectiveDate" value="{{ old('effectiveDate') }}" required autocomplete="effectiveDate" autofocus>
                                    @error('effectiveDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="userSignatureId" class="col-form-label text-md-right">{{ __('Signature') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="signatureID" id="signatureID" class="form-control @error('signatureID') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
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

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="recommendedBy" class="col-form-label text-md-right">{{ __('Recommended By') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="recommendedBy" id="recommendedBy" class="form-control @error('recommendedBy') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
                                        @foreach($users as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('recommendedBy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="approvedBy" class="col-form-label text-md-right">{{ __('Approved By') }}</label>
                                </div>
                                <div class="col-md-7">
                                    <select name="approvedBy" id="approvedBy" class="form-control @error('approvedBy') is-invalid @enderror">
                                        <option value="0">--Choose Option--</option>
                                        @foreach($users as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('approvedBy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-3 offset-md-3">
                                    <button data-dismiss="modal"  class="btn btn-danger btn-block">
                                        {{ __('Cancel') }}
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                    {{--                    <div class="modal-footer"></div>--}}
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" hidden style="color:#4267b2; font-weight: bolder ">{{ __('Leave Application Data Table') }}</div>

                    <div class="card-body">
                        <div class="col-md-12">
                            @if($leave->count() > 0)

                                <table class="table">
                                    <thead style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Applied</th>
                                        <th>Year</th>
                                        <th>Effective</th>
                                        <th>Leave Entitlement</th>
                                        <th>Signature</th>
                                        <th>Recommendation</th>
                                        <th>Approval</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($leave as $item)
                                        @if($item->approvedBy ===0)
                                        <tr>
                                            <td>{{$item->user->name?? ''}}</td>
                                            <td>{{$item->job->name?? ''}}</td>
                                            <td>{{$item->department->name?? ''}}</td>
                                            <td>{{$item->applyfor?? ''}}</td>
                                            <td>{{$item->year?? ''}}</td>
                                            <td>{{$item->effectiveDate?? ''}}</td>
                                            <td>{{$item->user->ranks->entitlement?? ''}}</td>
                                            <td>{{$item->approves->name ?? ''}}</td>
                                            <td>{{$item->recommend->name ?? 'Not recommended'}}</td>
                                            <td>{{$item->approve->name ?? 'Not approved'}}</td>
                                            <td>
                                                    <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                        <a href="javascript:(0);" id="al"
                                                           data-ids="{{$item->id}}"
                                                           data-names="{{$item->user_id}}"
                                                           data-job="{{$item->title_id}}"
                                                           data-department="{{$item->department_id}}"
                                                           data-applyfor="{{$item->applyfor}}"
                                                           data-year="{{$item->year}}"
                                                           data-effective="{{$item->effectiveDate?? ''}}"
                                                           data-sign="{{$item->approves->sign_id ?? ''}}"
                                                           data-recommended="{{$item->recommendedBy?? ''}}"
                                                           data-approved="{{$item->approvedBy?? ''}}"
                                                           data-toggle="modal" data-target="#approve" class="dropdown-item">Approve </a>
                                                        {!! Form::open(['method'=>'DELETE','action'=>['AnnualLeaveController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to post');"],['class'=>'form-inline'])!!}
                                                        <button class="dropdown-item remove" type="submit">Remove</button>
                                                        {!! Form::close() !!}

                                                    </div>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                    <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>Department</th>
                                        <th>Applied</th>
                                        <th>Year</th>
                                        <th>Effective</th>
                                        <th>Leave Entitlement</th>
                                        <th>Signature</th>
                                        <th>Recommendation</th>
                                        <th>Approval</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            @else
                                <p>No Leave Application Available</p>
                            @endif

                                <br>
                                <br>
                                <br>
                                <br>
                                @foreach($leave as $item)
                                    @if($item->approvedBy !==0)
                                        <table class="table">
                                            <thead style="background-color:#a71a1a; color: #fff; font-family: San Francisco ;">
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Title</th>
                                                <th>Department</th>
                                                <th>Year</th>
                                                <th>Effective</th>
                                                <th>Entitlement</th>
                                                <th>Carried Over</th>
                                                <th>Total Entitlement</th>
                                                <th>Applied</th>
                                                <th>Remaining</th>
                                                <th>Signature</th>
                                                <th>Recommendation</th>
                                                <th>Approval</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$item->user->name?? ''}}</td>
                                                <td>{{$item->job->name?? ''}}</td>
                                                <td>{{$item->department->name?? ''}}</td>
                                                <td>{{$item->year?? ''}}</td>
                                                <td>{{$item->effectiveDate?? ''}}</td>
                                                <td>{{$item->user->ranks->entitlement?? ''}}</td>
                                                <td>
                                                    {{App\LeaveCarriedOver::where('userId',$item->user->id)->whereIn('year',[$item->year-1,$item->year])->pluck('carriedOver')->sum()}}
                                                </td>

                                                <td>
                                                    {{$totalEntitlement=$item->user->ranks->entitlement+App\LeaveCarriedOver::where('userId',$item->user->id)->whereIn('year',[$item->year-1,$item->year])->pluck('carriedOver')->sum()}}
                                                </td>
                                                <td>{{$item->applyfor?? ''}}</td>
                                                <td>
                                                    {{$totalEntitlement-$item->applyfor}}
                                                </td>

                                                <td>{{$item->approves->name ?? ''}}</td>
                                                <td>{{$item->recommend->name ?? 'Not recommended'}}</td>
                                                <td>{{$item->approve->name ?? 'Not approved'}}</td>
                                                <td>
                                                    <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                        <a href="javascript:(0);" id="al"
                                                           data-ids="{{$item->id}}"
                                                           data-names="{{$item->user_id}}"
                                                           data-job="{{$item->title_id}}"
                                                           data-department="{{$item->department_id}}"
                                                           data-applyfor="{{$item->applyfor}}"
                                                           data-year="{{$item->year}}"
                                                           data-effective="{{$item->effectiveDate}}"
                                                           data-sign="{{$item->approves->sign_id ?? ''}}"
                                                           data-recommended="{{$item->recommendedBy ?? ''}}"
                                                           data-approved="{{$item->approvedBy ?? ''}}"
                                                           data-toggle="modal" data-target="#approve" class="dropdown-item">Approve </a>
                                                        {!! Form::open(['method'=>'DELETE','action'=>['AnnualLeaveController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to post');"],['class'=>'form-inline'])!!}
                                                        <button class="dropdown-item remove" type="submit">Remove</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                            <tr>
                                                <th>Name</th>
                                                <th>Job Title</th>
                                                <th>Department</th>
                                                <th>Year</th>
                                                <th>Effective</th>
                                                <th>Entitlement</th>
                                                <th>Carried Over</th>
                                                <th>Total Entitlement</th>
                                                <th>Applied</th>
                                                <th>Remaining</th>
                                                <th>Signature</th>
                                                <th>Recommendation</th>
                                                <th>Approval</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    @endif

                                @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
