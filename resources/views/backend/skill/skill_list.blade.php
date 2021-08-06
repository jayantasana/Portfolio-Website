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
            <th class="text-center">Skill</th>
            <th class="text-center">Percent</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($skills as $key=>$skill)
                <tr class="text-center">
                    <th>{{ $skills->firstItem() + $key }}</th>
                    <td>{{ $skill->skill }}</td>
                    <td>{{ $skill->percent }}</td>
                    <td class="d-flex">
                        <a href="{{ route('SkillEdit', $skill->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('SkillDelete', $skill->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
             @endforeach
        </tbody>
      </table>
      {{ $skills->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Basic Table</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Skill</th>
              <th class="text-center">Percent</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trash_skill as $tskill)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tskill->skill }}</td>
                      <td>{{ $tskill->percent }}</td>
                      <td class="d-flex">
                          <a href="{{ route('SkillRestore', $tskill->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('SkillParmanentDelete', $tskill->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('SkillDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Skill Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

        @if(session('SkillRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Skill Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

        @if(session('SkillParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Skill Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
