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
            <th class="text-center">Times</th>
            <th class="text-center">Position</th>
            <th class="text-center">Description</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($experience as $key=>$experiences)
                <tr class="text-center">
                    <th>{{ $experience->firstItem() + $key }}</th>
                    <td>{{ $experiences->position }}</td>
                    <td>{{ $experiences->times }}</td>
                    <td>{{ $experiences->description }}</td>
                    <td class="d-flex">
                        <a href="{{ route('ExperienceEdit', $experiences->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('ExperienceDelete', $experiences->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $experience->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Times</th>
              <th class="text-center">Position</th>
              <th class="text-center">Description</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trushexperience as $texperience)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $texperience->position }}</td>
                      <td>{{ $texperience->times }}</td>
                      <td>{{ $texperience->description }}</td>
                      <td class="d-flex">
                          <a href="{{ route('ExperienceRestore', $texperience->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('ExperienceParmanentDelete', $texperience->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('ExperienceDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Experience Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ExperienceRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Experience Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('ExperienceParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Experience Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
