@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Member Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{route('administrative.member')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="server"></i>
            Member List
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card offset-md-2">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Member Create</h6>
                <form class="forms-sample" action="{{route('administrative.member.store')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif -->
                    <div class="form-group {{ $errors->has('serial') ? 'has-danger' : '' }}">
                        <label for="serial">Serial</label>
                        <input required type="number" class="form-control form-control-danger" id="serial" name="serial" autocomplete="off" placeholder="Serial" aria-invalid="true">
                        @if($errors->has('serial'))
                        <label id="serial-error" class="error mt-2 text-danger" for="title">Please enter a serial</label>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" value="{{isset($data) ? $data->name : ''}}" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Name" aria-invalid="true">
                        @if($errors->has('name'))
                        <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('designation') ? 'has-danger' : '' }}">
                        <label for="designation">Designation</label>
                        <input type="text" value="{{isset($data) ? $data->designation : ''}}" class="form-control form-control-danger" id="designation" name="designation" autocomplete="off" placeholder="Designation" aria-invalid="true">
                        @if($errors->has('designation'))
                        <label id="designation-error" class="error mt-2 text-danger" for="title">Please enter a designation</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('facebook_link') ? 'has-danger' : '' }}">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" value="{{isset($data) ? $data->facebook_link : ''}}" class="form-control form-control-danger" id="facebook_link" name="facebook_link" autocomplete="off" placeholder="Facebook Link" aria-invalid="true">
                        @if($errors->has('facebook_link'))
                        <label id="facebook_link-error" class="error mt-2 text-danger" for="title">Please enter a facebook link</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('instagram_link') ? 'has-danger' : '' }}">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" value="{{isset($data) ? $data->instagram_link : ''}}" class="form-control form-control-danger" id="instagram_link" name="instagram_link" autocomplete="off" placeholder="Instagram Link" aria-invalid="true">
                        @if($errors->has('instagram_link'))
                        <label id="instagram_link-error" class="error mt-2 text-danger" for="title">Please enter a instagram link</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('file') ? 'has-danger' : '' }}">
                        <label for="file"><span class="text-danger">Select Image (Width 500, Height 600px)**</span></label>
                        <input required style="height: 35px;" type="file" id="file" name="file" class="file-upload-default">
                        <div style="height: 35px;" class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('administrative.member') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
@endsection