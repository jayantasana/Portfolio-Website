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
            <th class="text-center">Setting_Id</th>
            <th class="text-center">Social_Id</th>
            <th class="text-center">social</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($sociallink as $key=>$item)
                <tr class="text-center">
                    <th>{{ $sociallink->firstItem() + $key }}</th>
                    <td>{{ $item->setting_id }}</td>
                    <td>{{ $item->social_id }}</td>
                    <td>{{ $item->social }}</td>
                    <td class="text-cener">
                        <a href="{{ route('SocialLinkEdit', $item->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('SocialLinkDelete', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $sociallink->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Setting_Id</th>
              <th class="text-center">Social_Id</th>
              <th class="text-center">social</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($tslink as $tsociallink)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tsociallink->setting_id }}</td>
                      <td>{{ $tsociallink->social_id }}</td>
                      <td>{{ $tsociallink->social }}</td>
                      <td class="text-cener">
                          <a href="{{ route('SocialLinkRestore', $tsociallink->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('SocialLinkParmanentDelete', $tsociallink->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('SocialLinkDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Link Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SocialLinkRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Link Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('SocialLinkParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Social Link Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
