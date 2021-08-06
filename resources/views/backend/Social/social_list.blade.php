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
            <th class="text-center">Name</th>
            <th class="text-center">slug</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($social as $key=>$item)
                <tr class="text-center">
                    <th>{{ $social->firstItem() + $key }}</th>
                    <td>{{ $item->socialname }}</td>
                    <td>{{ $item->slug }}</td>
                    <td class="text-cener">
                        <a href="{{ route('SocialEdit', $item->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('SocialDelete', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $social->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Name</th>
              <th class="text-center">slug</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trashsocial as $tsocial)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tsocial->socialname }}</td>
                      <td>{{ $tsocial->slug }}</td>
                      <td class="text-cener">
                          <a href="{{ route('SocialRestore', $tsocial->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('SocialParmanentDelete', $tsocial->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('SocialDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

        @if(session('SocialRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

        @if(session('SocialParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
