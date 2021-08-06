@extends('backend.master')
@section('about')
    active
@endsection
@section('dboard')
    About->About-list
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
            <th class="text-center">Position</th>
            <th class="text-center">Description</th>
            <th class="text-center">Image</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($about as $item)
                <tr class="text-center">
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->description }}</td>
                    <td><img src="{{ asset('aboutimages/' . $item->image) }}" width="80px" alt="image"></td>
                    <td class="d-flex">
                        <a href="{{ route('AboutEdit', $item->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('AboutDelete', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Deleted List</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Position</th>
              <th class="text-center">Description</th>
              <th class="text-center">Image</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trush_about as $trushed)
                  <tr class="text-center">
                      <th>{{ $trushed->id }}</th>
                      <td>{{ $trushed->position }}</td>
                      <td>{{ $trushed->description }}</td>
                      <td><img src="{{ asset('aboutimages/' . $trushed->image) }}" width="80px" alt="image"></td>
                      <td class="d-flex">
                          <a href="{{ route('AboutRestore', $trushed->id ) }}" class="btn btn-success mr-2">Restore</a>
                          <a href="{{ route('AboutParmanentDelete', $trushed->id) }}" class="btn btn-danger">Delete</a>
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

        @if(session('AboutDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'About Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('AboutRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'About Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('AboutParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'About Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
