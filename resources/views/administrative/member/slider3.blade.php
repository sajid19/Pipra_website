<div id="slider-3">
  <div class="form-group {{ $errors->has('file') ? 'has-danger' : '' }}">
    <label for="file"><span class="text-danger">Select Image (Width 800px, Height 500px)**</span></label>
    <input style="height: 35px;" type="file" id="file" name="file" class="file-upload-default">
    <div style="height: 35px;" class="input-group col-xs-12">
      <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
      <span class="input-group-append">
        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
      </span>
    </div>
  </div>

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
</div>