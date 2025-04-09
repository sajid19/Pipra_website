@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Project Create</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{route('administrative.project')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="server"></i>
            Project List
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-8 grid-margin stretch-card offset-md-2">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Project Create</h6>
                <form class="forms-sample" action="{{route('administrative.project.store')}} " method="POST" enctype="multipart/form-data">
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
                    <div class="form-group {{ $errors->has('title') ? 'has-danger' : '' }}">
                        <label for="title">Title</label>
                        <input required type="text" class="form-control form-control-danger" id="title" name="title" autocomplete="off" placeholder="Title" aria-invalid="true">
                        @if($errors->has('title'))
                        <label id="title-error" class="error mt-2 text-danger" for="title">Please enter a project title</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('sub_title') ? 'has-danger' : '' }}">
                        <label for="sub_title">Sub Title</label>
                        <textarea type="text" class="form-control form-height @error('sub_title') border @enderror" id="sub_title" rows="4" name="sub_title"></textarea>
                        @if($errors->has('sub_title'))
                        <label id="sub_title-error" class="error mt-2 text-danger" for="title">Please enter a project sub title</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control form-height @error('description') border @enderror" id="description" rows="8" name="description"></textarea>
                        @if($errors->has('description'))
                        <label id="description-error" class="error mt-2 text-danger" for="title">Please enter a description</label>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('file') ? 'has-danger' : '' }}">
                        <label for="file">Select Image (Width 360px, Height 560px)</label>
                        <input required style="height: 35px;" type="file" id="file" name="file" class="file-upload-default">
                        <div style="height: 35px;" class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary mb-3" id="add-new-section">Add Slider Image</button>

                    <div id="slider-images-container" data-row="1"></div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('administrative.project') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    $(function() {
        CKEDITOR.replace('sub_title', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });
    });
    $(function() {
        CKEDITOR.replace('description', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });
    });
</script>

<script>
    function generateNewSection(index) {
        return `
        <div class="image-section">
        <h5>Slider image ${index}</h5>
        <hr>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                        <label for="file">Select Image (Width 770px, Height 420px)</label>
                        <input required style="height: 35px;" type="file" id="file" name="slider[${index}][file]" class="file-upload-default">
                        <div style="height: 35px;" class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-remove-section" style="margin-top:32px">Remove</button>
            </div>
        </div>
        </div>
        
    `;
    }


    $('#add-new-section').click(function() {
        var sectionIndex = parseInt($('#slider-images-container').attr('data-row'));
        var newSection = generateNewSection(sectionIndex);
        $('#slider-images-container').append(newSection);
        $('#slider-images-container').attr('data-row', sectionIndex + 1);
    });

    $(document).on('click', '.btn-remove-section', function() {
        $(this).closest('.image-section').remove();
    });
</script>
@endsection