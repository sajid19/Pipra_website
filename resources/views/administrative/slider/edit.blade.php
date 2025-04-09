@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Slider Edit</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{route('administrative.slider')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="server"></i>
            Slider List
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card offset-md-2">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Slider Edit</h6>
                <form class="forms-sample" action="{{route('administrative.slider.update', $data->id)}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    {!! method_field('PUT') !!}
                    @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <div id="slider-1" class="form-group {{ $errors->has('file') ? 'has-danger' : '' }}">
                        <label for="file"><span class="text-danger">Select Image (Width 1920px, Height 1080px)**</span></label>
                        <input style="height: 35px;" type="file" id="file" name="file" class="file-upload-default">
                        <div style="height: 35px;" class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    @if(!empty($data->file))
                    <div class="mb-3">
                        <img src="{{ $data->file }}" alt="" data-lazyload="{{ $data->file }}" height="80" width="50">
                    </div>
                    @endif

                    <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                        <label for="title">Title</label>
                        <input type="text" value="{{isset($data) ? $data->title : ''}}" class="form-control form-control-danger" id="title" name="title" autocomplete="off" placeholder="Title" aria-invalid="true">
                        @if($errors->has('title'))
                        <label id="title-error" class="error mt-2 text-danger" for="title">Please enter a project title</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('sub_title') ? 'has-danger' : '' }}">
                        <label for="sub_title">Sub Title</label>
                        <textarea type="text" class="form-control form-height @error('sub_title') border @enderror" id="sub_title" rows="4" name="sub_title">{!!isset($data) ? $data->sub_title : ''!!}</textarea>
                        @if($errors->has('sub_title'))
                        <label id="sub_title-error" class="error mt-2 text-danger" for="title">Please enter a project sub title</label>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('administrative.slider') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    CKEDITOR.replace('sub_title', {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor'
    });
</script>
@endsection