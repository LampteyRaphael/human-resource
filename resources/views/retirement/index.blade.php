@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h3"  style="color:#4267b2; font-weight: bolder ">{{ __('Retirement Notification') }}</div>

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
                                        <th>Date Of Birth</th>
                                        <th>DOB Readable</th>
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
                                            <td>{{$item->dob}}</td>
                                            <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                       data-toggle="modal" data-target="#approveAdmin" class="dropdown-item">Approve</a>
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
                                            <th>Date Of Birth</th>
                                            <th>DOB Readable</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $item)
                                            <?php $due=Carbon\Carbon::parse($item->dob)->diffForHumans();?>
                                            @if($due=="50 years ago")
                                                   <tr bgcolor="red">
                                                <td>{{$item->name?? ''}}</td>
                                                <td>{{$item->email?? ''}}</td>
                                                <td>{{$item->telephone?? ''}}</td>
                                                <td>{{$item->dateOfAppointment?? ''}}</td>
                                                <td>{{$item->ranks->name ?? ''}}</td>
                                                <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                <td>{{$item->dob}}</td>
                                                <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                @elseif($due=="55 years ago")
                                                    <tr style="background-color: #857b26">
                                                        <td>{{$item->name?? ''}}</td>
                                                        <td>{{$item->email?? ''}}</td>
                                                        <td>{{$item->telephone?? ''}}</td>
                                                        <td>{{$item->dateOfAppointment?? ''}}</td>
                                                        <td>{{$item->ranks->name ?? ''}}</td>
                                                        <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                        <td>{{$item->dob}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                @elseif($due=="56 years ago")
                                                    <tr bgcolor="yellow">
                                                        <td>{{$item->name?? ''}}</td>
                                                        <td>{{$item->email?? ''}}</td>
                                                        <td>{{$item->telephone?? ''}}</td>
                                                        <td>{{$item->dateOfAppointment?? ''}}</td>
                                                        <td>{{$item->ranks->name ?? ''}}</td>
                                                        <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                        <td>{{$item->dob}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                @elseif($due=="58 years ago")
                                                    <tr bgcolor="green">
                                                        <td>{{$item->name?? ''}}</td>
                                                        <td>{{$item->email?? ''}}</td>
                                                        <td>{{$item->telephone?? ''}}</td>
                                                        <td>{{$item->dateOfAppointment?? ''}}</td>
                                                        <td>{{$item->ranks->name ?? ''}}</td>
                                                        <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                        <td>{{$item->dob}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                @elseif($due=="59 years ago")
                                                    <tr bgcolor="yellow">
                                                        <td>{{$item->name?? ''}}</td>
                                                        <td>{{$item->email?? ''}}</td>
                                                        <td>{{$item->telephone?? ''}}</td>
                                                        <td>{{$item->dateOfAppointment?? ''}}</td>
                                                        <td>{{$item->ranks->name ?? ''}}</td>
                                                        <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                        <td>{{$item->dob}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                                @elseif($due=="60 years ago")
                                                    <tr bgcolor="red">
                                                        <td>{{$item->name?? ''}}</td>
                                                        <td>{{$item->email?? ''}}</td>
                                                        <td>{{$item->telephone?? ''}}</td>
                                                        <td>{{$item->dateOfAppointment?? ''}}</td>
                                                        <td>{{$item->ranks->name ?? ''}}</td>
                                                        <td>{{$item->ranks->entitlement ?? ''}}</td>
                                                        <td>{{$item->dob}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->dob)->diffForHumans()?? ''}}</td>
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
                                            @else
                                            @endif
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
