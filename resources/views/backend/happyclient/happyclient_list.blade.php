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
            <th class="text-center">Counter</th>
            <th class="text-center">Title</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($happyclient as $key=>$happy)
                <tr class="text-center">
                    <th>{{ $happyclient->firstItem() + $key }}</th>
                    <td>{{ $happy->counter }}</td>
                    <td>{{ $happy->title }}</td>
                    <td class="d-flex">
                        <a href="{{ route('HappyClientEdit', $happy->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('HappyClientDelete', $happy->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $happyclient->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Deleted List</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Counter</th>
              <th class="text-center">Title</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($happytrush as $thappy)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $thappy->counter }}</td>
                      <td>{{ $thappy->title }}</td>
                      <td class="d-flex">
                          <a href="{{ route('HappyClientRestore', $thappy->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('HappyClientParmanentDelete', $thappy->id) }}" class="btn btn-danger">Delete</a>
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

        @if(session('HappyClientDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Happy Client Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('HappyClientRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Happy Client Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('HappyClientParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Happy Client Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
