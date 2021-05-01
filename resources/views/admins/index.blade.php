@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="modal fade" id="approveAdmin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">Edit User Profile</div>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['method'=>'PUT','action'=>['AdminsController@update','updating.....'],'onsubmit'=>"return confirm('Are you sure you want to post')",'enctype'=>"multipart/form-data"] ) !!}
                            @csrf
                            <input type="hidden" id="ids" name="ids" />
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" required autocomplete="telephone">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Appointment') }}</label>

                                <div class="col-md-6">
                                    <input id="dateOfAppointment" type="date" class="form-control @error('dateOfAppointment') is-invalid @enderror" name="dateOfAppointment" required autocomplete="dateOfAppointment">

                                    @error('dateOfAppointment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group @error('rank')  @enderror row">
                                <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Rank') }}</label>
                                <div class="col-md-6">
                                    <select name="rank" id="rank" class="form-control @error('rank') is-invalid @enderror">
                                        <option value="">--Choose Option--</option>
                                        @foreach($rank as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="photo_id" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="photo_id" type="file" class="form-control @error('photo_id') is-invalid @enderror" name="photo_id">

                                    @error('photo_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h3"  style="color:#4267b2; font-weight: bolder ">{{ __('List Of Admins') }}</div>

                    <div class="card-body">
                        <div class="col-md-12">
                            @if($admins->count() > 0)

                                <table class="table">
                                    <thead style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Date Of Appointment</th>
                                        <th>Rank</th>
                                        <th>Leave Entitle</th>
                                        <th>Photo</th>
                                        <th>Signature</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $item)
                                            <tr>
                                                <td>{{$item->name?? ''}}</td>
                                                <td>{{$item->email?? ''}}</td>
                                                <td>{{$item->telephone?? ''}}</td>
                                                <td>{{$item->dateOfAppointment?? ''}}</td>
                                                <td>{{$item->ranks->name ?? ''}}</td>
                                                <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                <td>{{$item->photo_id?? ''}}</td>
                                                <td>{{$item->sign_id?? ''}}</td>
                                                <td>
                                                    <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                        Action
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                        <a href="javascript:(0);" id="al"
                                                           data-ids="{{$item->id}}"
                                                           data-names="{{$item->name}}"
                                                           data-email="{{$item->email}}"
                                                           data-dateofappointment="{{$item->dateOfAppointment}}"
                                                           data-telephone="{{$item->telephone}}"
                                                           data-appoint="{{$item->dateOfAppointment}}"
                                                           data-rank="{{$item->rank_models_id ?? ''}}"
                                                           data-toggle="modal" data-target="#approveAdmin" class="dropdown-item">Approve </a>
                                                        {!! Form::open(['method'=>'DELETE','action'=>['AdminsController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to delete');"],['class'=>'form-inline'])!!}
                                                        <button class="dropdown-item remove" type="submit">Remove</button>
                                                        {!! Form::close() !!}

                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Date Of Appointment</th>
                                        <th>Rank</th>
                                        <th>Leave Entitle</th>
                                        <th>Photo</th>
                                        <th>Signature</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            @else
                                <p>No Leave Application Available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
