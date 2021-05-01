@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" hidden style="color:#4267b2; font-weight: bolder ">{{ __('Jobs Title') }}</div>

                    <div class="card-body">
                        <div class="col-md-12">
                            @if($jobs->count() > 0)
                                <table class="table">
                                    <thead style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Jobs</th>
                                        <th>Created At</th>
                                        <th>Updated At
                                        </th>
                                        <th>
                                            <a href="#" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm ml-5">Create</a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jobs as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->created_at->diffForHumans()}}</td>
                                            <td>{{$item->updated_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="" id="admins" class="dropdown-toggle text-dark"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                                    Action
                                                </a>
                                                <div class="dropdown-menu dropdown-menu action" aria-labelledby="admins" id="action">
                                                    <a href="javascript:(0);" id="al"
                                                       data-ids="{{$item->id}}"
                                                       data-names="{{$item->name}}"
                                                       data-toggle="modal" data-target="#addupdate" class="dropdown-item">Update </a>
                                                    {!! Form::open(['method'=>'DELETE','action'=>['JobTitleController@destroy',$item->id],'onsubmit'=>"return confirm('Are you sure you want to post');"],['class'=>'form-inline'])!!}
                                                    <button class="dropdown-item remove" type="submit">Remove</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <tr>
                                        <th>Department</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            @else
                                <p>No  Available Department</p>
                                <a href="#" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm ml-5">Create</a>
                            @endif
                        </div>
                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content" style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            Department Form
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['method'=>'POST','action'=>'JobTitleController@store','onsubmit'=>"return confirm('Are you sure you want to post');"] ) !!}
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Department') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
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

                        <div class="modal fade" id="addupdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content" style="background-color:#4267b2; color: #fff; font-family: San Francisco ;">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            Department Form
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['method'=>'PUT','action'=>['JobTitleController@update','updating...'],'onsubmit'=>"return confirm('Are you sure you want to post');"] ) !!}
                                        @csrf
                                        <input type="hidden" id="ids" name="ids" />
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="name" class="col-form-label text-md-right">{{ __('Department') }}</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
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
                                                    {{ __('Update') }}
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                    {{--                    <div class="modal-footer"></div>--}}
                                </div>
                            </div>
                        </div>

@endsection
