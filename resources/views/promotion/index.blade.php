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
                        {!! Form::open(['method'=>'POST','action'=>['PromotionController@store'],'onsubmit'=>"return confirm('Are you sure you want to post')",'enctype'=>"multipart/form-data"] ) !!}
                        @csrf
                        <input type="hidden" id="ids" name="user_id" />
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

                        <div class="form-group @error('approval')  @enderror row">
                            <label for="approval" class="col-md-4 col-form-label text-md-right">{{ __('Select Approval') }}</label>
                            <div class="col-md-6">
                                <select name="approval" id="approval" class="form-control @error('approval') is-invalid @enderror">
                                    <option value="">--Choose Option--</option>
                                        <option value="approved">Approved</option>
{{--                                         <option value="not approved">Not Approved</option>--}}
                                </select>
                                @error('approval')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="itemTaken" class="col-md-4 col-form-label text-md-right">{{ __('Item Receiving') }}</label>
                            <div class="col-md-6">
                                <textarea name="itemTaken" id="itemTaken" cols="5" rows="5" class="form-control @error('itemTaken') is-invalid @enderror">
                                </textarea>
                                @error('itemTaken')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Promote') }}
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
{{--  due for promotion      --}}
        @if($promotion->count() > 0)
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header h3 font-weight-bolder"  style="color:#4267b2; font-weight: bolder ">{{ __('Users Ready For Promotion') }}</div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table">
                                <thead style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Rank</th>
                                    <th>Date Of Appointment</th>
                                    <th>Due For Promotion</th>
                                    <th>Approval</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($promotion as $item)
                                <?php $due=Carbon\Carbon::parse($item->dateOfAppointment)->diffForHumans();?>
                                <div class="" hidden>{{$userId[]=$item->id}}</div>
                                @if($item->approvePromotion =='not approved')

                                    @if($due=="5 years ago" || $due=="10 years ago" || $due=="15 years ago" || $due=="20 years ago")
                                        <tr>

                                            <td>{{$item->photo_id?? ''}}</td>
                                            <td>{{$item->name?? ''}}</td>
                                            <td>{{$item->email?? ''}}</td>
                                            <td>{{$item->telephone?? ''}}</td>
                                            <td>{{$item->ranks->name ?? ''}}</td>
                                            <td>{{$item->dateOfAppointment}}</td>
                                            <td>{{Carbon\Carbon::parse($item->dateOfAppointment)->diffForHumans()?? ''}}</td>
                                            <td>{{$item->approvePromotion==1?  'Approved': 'Not Approved'}}</td>
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
                                    @endif
                                @else
                                @endif

                            @endforeach
                                    </tbody>
                                        <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Rank</th>
                                            <th>Date Of Appointment</th>
                                            <th>Due For Promotion</th>
                                            <th>Approval</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                            <div class="col-md-12">
                                {{--                                    @if($promotion->count() > 0)--}}
                                <br>
                                <br>
                                <br>
                                <table class="table">
                                    <thead style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Rank</th>
                                        <th>Date Received Promotion</th>
                                        <th>Item Received</th>
                                        <th>Approved</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(App\PromotionModal::orderBy('user_id','asc')->whereIn('user_id',$userId)->get() as $item)
                                        @if($item->approval=='approved')
                                            @if(Carbon\Carbon::parse($item->created_at)->format('d m Y') === \Carbon\Carbon::now()->format('d m Y'))
                                                <tr style="background-color: #f1b317">
                                                    <td>{{$item->user->photo_id?? ''}}</td>
                                                    <td>{{$item->user->name?? ''}}</td>
                                                    <td>{{$item->user->email?? ''}}</td>
                                                    <td>{{$item->user->telephone?? ''}}</td>
                                                    <td>{{$item->user->ranks->name ?? ''}}</td>
                                                    <td>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()?? ''}}</td>
                                                    <td>{{$item->itemTaken}}</td>
                                                    <td>{{$item->approval}}</td>
                                                    <td>
                                                        <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                            <a href="javascript:(0);" id="al"
                                                               data-ids="{{$item->user->id}}"
                                                               data-names="{{$item->user->name}}"
                                                               data-email="{{$item->user->email}}"
                                                               data-dateofappointment="{{$item->dateOfAppointment}}"
                                                               data-telephone="{{$item->telephone}}"
                                                               data-appoint="{{$item->dateOfAppointment}}"
                                                               data-rank="{{$item->rank_models_id ?? ''}}"
                                                               data-toggle="modal" data-target="#approveAdmin" class="dropdown-item">Approve </a>
                                                            {!! Form::open(['method'=>'DELETE','action'=>['PromotionController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to delete');"],['class'=>'form-inline'])!!}
                                                            <button class="dropdown-item remove" type="submit">Remove</button>
                                                            {!! Form::close() !!}
                                                            {!! Form::open(['method'=>'PUT','action'=>['PromotionController@update','reversing'],'onsubmit'=>"return confirm('Are you sure you want to Reverse to not approved');"],['class'=>'form-inline'])!!}
                                                            <input type="hidden" name="ids" value="{{$item->user->id}}">
                                                            <button class="dropdown-item remove" type="submit">Not Approve</button>
                                                            {!! Form::close() !!}

                                                        </div>
                                                    </td>
                                                </tr>

                                            @else
                                                <tr>
                                                    <td>{{$item->user->photo_id?? ''}}</td>
                                                    <td>{{$item->user->name?? ''}}</td>
                                                    <td>{{$item->user->email?? ''}}</td>
                                                    <td>{{$item->user->telephone?? ''}}</td>
                                                    <td>{{$item->user->ranks->name ?? ''}}</td>
                                                    <td>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()?? ''}}</td>
                                                    <td>{{$item->itemTaken}}</td>
                                                    <td>{{$item->approval}}</td>
                                                    <td>
                                                        <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                            Action
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                            <a href="javascript:(0);" id="al"
                                                               data-ids="{{$item->user->id}}"
                                                               data-names="{{$item->user->name}}"
                                                               data-email="{{$item->user->email}}"
                                                               data-dateofappointment="{{$item->user->dateOfAppointment}}"
                                                               data-telephone="{{$item->user->telephone}}"
                                                               data-appoint="{{$item->user->dateOfAppointment}}"
                                                               data-rank="{{$item->user->rank_models_id ?? ''}}"
                                                               data-toggle="modal" data-target="#approveAdmin" class="dropdown-item">Approve </a>
                                                            {!! Form::open(['method'=>'DELETE','action'=>['PromotionController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to delete');"],['class'=>'form-inline'])!!}
                                                            <button class="dropdown-item remove" type="submit">Remove</button>
                                                            {!! Form::close() !!}

                                                            {!! Form::open(['method'=>'PUT','action'=>['PromotionController@update','reversing'],'onsubmit'=>"return confirm('Are you sure you want to Reverse to not approved');"],['class'=>'form-inline'])!!}
                                                            <input type="hidden" name="ids" value="{{$item->user->id}}">
                                                            <button class="dropdown-item remove" type="submit">Not Approve</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                        @endif


                                    @endforeach
                                    </tbody>
                                    <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Rank</th>
                                        <th>Claim Of Promotion</th>
                                        <th>Approved</th>
                                        <th>Item</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                                <p>No Promotion Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
{{--        end for promotion--}}
</div>


@endsection
