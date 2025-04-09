<div id="slider-4" class="form-group {{ $errors->has('file') ? 'has-danger' : '' }}">
  <label for="file"><span class="text-danger">Select Image (Width 360px, Height 560px)**</span></label>
  <input style="height: 35px;" type="file" id="file" name="file" class="file-upload-default">
  <div style="height: 35px;" class="input-group col-xs-12">
    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Image">
    <span class="input-group-append">
      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
    </span>
  </div>
</div>