@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Slider Create</h4>
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
                <h6 class="card-title">Slider Create</h6>
                <form class="forms-sample" action="{{route('administrative.slider.store')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <div class="form-group {{ $errors->has('serial') ? 'has-danger' : '' }}">
                        <label for="serial">Serial</label>
                        <input required type="number" class="form-control form-control-danger" id="serial" name="serial" autocomplete="off" placeholder="Serial" aria-invalid="true">
                        @if($errors->has('serial'))
                        <label id="serial-error" class="error mt-2 text-danger" for="title">Please enter a serial</label>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                        <label for="type">Type</label>
                        <select required name="type" id="type" class="form-control js-example-basic-single w-100">
                            <option value="">Select</option>
                            <option value="slider-1" {{ isset($data) && $data->type == 'slider-1' ? 'selected' : '' }}>Slider 1 (Home Slider)</option>
                            <option value="slider-2" {{ isset($data) && $data->type == 'slider-2' ? 'selected' : '' }}>Slider 2 (WELCOME)</option>
                            <option value="slider-3" {{ isset($data) && $data->type == 'slider-3' ? 'selected' : '' }}>Slider 3 (WO WE ARE)</option>
                            <option value="about-slider" {{ isset($data) && $data->type == 'about-slider' ? 'selected' : '' }}>About Slider</option>
                        </select>
                        <label id="type-error" class="error mt-2 text-danger" for="type"></label>
                    </div>

                    <div id="extend-content"></div>

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
    $(document).on('change', '#type', function() {

        var val = $(this).val();

        if (val) {
            var url = "{{route('administrative.slider.get.content')}}";
            $.get(url, {
                val: val,
            }, function(data) {
                $('#extend-content').empty();
                $('#extend-content').html(data);
                $(function() {
                    CKEDITOR.replace('sub_title', {
                        filebrowserImageBrowseUrl: '/file-manager/ckeditor'
                    });
                });
            });
        }

    });
</script>
@endsection