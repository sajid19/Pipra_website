@extends('administrative.layouts.master')
@section('page-css')

@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Slider</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <a href="{{route('administrative.slider.create')}}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="plus-square"></i>
      Add Slider
    </a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title"> </h6>
        <div class="table-responsive">
          <table id="datatables" class="table">
            <thead>
              <tr>
                <th> SL</th>
                <th>Type</th>
                <th>Image</th>
                <th class="disabled-sorting text-left">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-js')
<script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      },
      processing: true,
      serverSide: true,
      ajax: "{{route('administrative.slider.data')}}",
      columns: [{
          data: 'DT_RowIndex',
          name: 'DT_RowIndex',
          orderable: false,
          searchable: false
        },
        {
          data: 'type',
          name: 'type'
        },
        {
          data: 'img',
          name: 'img'
        },
        {
          data: 'action',
          name: 'action'
        },
      ]
    });
  });

  function deleteData(rowid) {
    let url = '{{ route("administrative.slider.destroy", ":id") }}';
    url = url.replace(':id', rowid);
    Swal.fire({
      title: 'Do you want to delete this?',
      showCancelButton: true,
      confirmButtonText: 'Yes, Do it',
    }).then((result) => {
      if (result.isConfirmed) {
        axios.delete(url).then(res => {
          if (res.data == 'success') {
            Swal.fire('Deleted!', '', 'success')
            $('#datatables').DataTable().ajax.reload(null, false);
          }
        });
      }
    })
  }
</script>
@endsection