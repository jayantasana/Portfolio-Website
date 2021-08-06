@extends('backend.master')
@section('active')
    active
@endsection
@section('content')
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="form-layout form-layout-4">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Left Label Alignment</h6>
            <p class="mg-b-30 tx-gray-600">A basic form where labels are aligned in left.</p>
            <form action="{{ route('HappyClientStore') }}" method="POST">
                @csrf
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Counter: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="number" name="counter" class="form-control" placeholder="Ex: 1125">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                    <input type="text" name="title" class="form-control" placeholder="Project Name">
                </div>
            </div><!-- row -->
            <div class="form-layout-footer mg-t-30 text-center">
              <button type="submit" class="btn btn-info" style="cursor: pointer">Submit Form</button>
            </div><!-- form-layout-footer -->
        </form>
          </div><!-- form-layout -->
        </div><!-- col-6 -->
      </div><!-- row -->

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

        @if(session('HappyClientStore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Happy Client Added Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>
@endsection
