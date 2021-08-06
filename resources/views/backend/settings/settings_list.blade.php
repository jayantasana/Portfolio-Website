@extends('backend.master')
@section('setting')
    active
@endsection
@section('content')
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Active List</h6>
      <p class="mg-b-25">Using the most basic table markup.</p>


      <table class="table table-bordered table-colored table-info">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Logo</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Birthday</th>
            <th class="text-center">Website</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($setting as $key=>$set)
                <tr class="text-center">
                    <th>{{ $setting->firstItem() + $key }}</th>
                    <td><img src="{{ asset('settings/'. $set->logo) }}" width="80px" alt="logo"></td>
                    <td>{{ $set->name }}</td>
                    <td>{{ $set->email }}</td>
                    <td>{{ $set->address }}</td>
                    <td>{{ $set->phone }}</td>
                    <td>{{ $set->birthday }}</td>
                    <td>{{ $set->website }}</td>
                    <td class="d-flex">
                        <a href="{{ route('SettingsEdit', $set->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('SettingsDelete', $set->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $setting->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14">Deleted List</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Logo</th>
              <th class="text-center">Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Address</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Birthday</th>
              <th class="text-center">Website</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trush_setting as $trushed)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td><img src="{{ asset('settings/'. $trushed->logo) }}" width="80px" alt="logo"></td>
                      <td>{{ $trushed->name }}</td>
                      <td>{{ $trushed->email }}</td>
                      <td>{{ $trushed->address }}</td>
                      <td>{{ $trushed->phone }}</td>
                      <td>{{ $trushed->birthday }}</td>
                      <td>{{ $trushed->website }}</td>
                      <td class="d-flex">
                          <a href="{{ route('SettingsRestore', $trushed->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('SettingsParmanentDelete', $trushed->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('SettingsDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Settings Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SettingsRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Settings Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SettingsParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Settings Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
