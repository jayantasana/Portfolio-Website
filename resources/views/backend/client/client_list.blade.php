@extends('backend.master')
@section('active')
    active
@endsection
@section('content')
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
      <p class="mg-b-25">Using the most basic table markup.</p>


      <table class="table table-bordered table-colored table-info">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Position</th>
            <th class="text-center">Comment</th>
            <th class="text-center">Image</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clientlist as $key=>$clientlst)
                <tr class="text-center">
                    <th>{{ $clientlist->firstItem() + $key }}</th>
                    <td>{{ $clientlst->title }}</td>
                    <td>{{ $clientlst->position }}</td>
                    <td>{{ $clientlst->comment }}</td>
                    <td><img src="{{ asset('clientimage/' . $clientlst->image) }}" width="80px" alt="Image"> </td>
                    <td class="d-flex">
                        <a href="{{ route('ClientEdit', $clientlst->id) }}" class="btn btn-primary mr-2"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('ClientDelete', $clientlst->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $clientlist->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Title</th>
              <th class="text-center">Position</th>
              <th class="text-center">Comment</th>
              <th class="text-center">Image</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trushclient as $tclient)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tclient->title }}</td>
                      <td>{{ $tclient->position }}</td>
                      <td>{{ $tclient->comment }}</td>
                      <td><img src="{{ asset('clientimage/' . $tclient->image) }}" width="80px" alt="Image"> </td>
                      <td class="d-flex">
                          <a href="{{ route('ClientRestore', $tclient->id) }}" class="btn btn-primary mr-2"><i class="fa fa-share"></i></a>
                          <a href="{{ route('ClientParmanentDelete', $tclient->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
@endsection
@section('footer_js')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if(session('ClientDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Client Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ClientRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Client Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ClientParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Client Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
