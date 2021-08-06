@extends('backend.master')
@section('content')
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
      <p class="mg-b-25">Using the most basic table markup.</p>


      <table class="table table-bordered table-colored table-info">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Service Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Icon</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($services as $key=>$service)
                <tr class="text-center">
                    <th>{{ $services->firstItem() + $key }}</th>
                    <td>{{ $service->servicename }}</td>
                    <td>{{ $service->description }}</td>
                    <td><img src="{{ asset('icon/' . $service->icon) }}" width="80px" alt="img"></td>
                    <td class="d-flex">
                        <a href="{{ route('ServiceEdit', $service->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('ServiceDelete', $service->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $services->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Service Name</th>
              <th class="text-center">Description</th>
              <th class="text-center">Icon</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trush_services as $tservice)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tservice->servicename }}</td>
                      <td>{{ $tservice->description }}</td>
                      <td><img src="{{ asset('icon/' . $tservice->icon) }}" width="80px" alt="img"></td>
                      <td class="d-flex">
                          <a href="{{ route('ServiceRestore', $tservice->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('ServiceParmanentDelete', $tservice->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('ServiceDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Service Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ServiceRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Service Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ServiceParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Service Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
