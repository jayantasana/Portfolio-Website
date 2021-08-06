@extends('backend.master')
@section('dboard')
    Dashboard->Settings
@endsection
@section('setting')
    active
@endsection
@section('content')
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="form-layout form-layout-4">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Basic Setting</h6><hr>
            <form action="{{ route('SettingsUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <input type="hidden" name="setting_id" value="{{ $settings->id }}">
                <label class="col-sm-3 form-control-label">Logo: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="file" name="logo" class="form-control">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="text" name="meta_tag" value="{{ $settings->meta_tag }}" class="form-control" placeholder="Enter Meta Tag">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Name: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="text" name="name" value="{{ $settings->name }}" class="form-control" placeholder="Enter firstname">
              </div>

            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Email: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="email" name="email" value="{{ $settings->email }}" class="form-control" placeholder="Enter email address">
              </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="number" name="phone" value="{{ $settings->phone }}" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" name="address" class="form-control" placeholder="Enter your address">{{ $settings->address }}</textarea>
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Birthday: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="date" name="birthday" value="{{ $settings->birthday }}" class="form-control" placeholder="Enter Date of Birth">
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Website: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="url" name="website" value="{{ $settings->website }}" class="form-control" placeholder="Enter Website URL">
                </div>
            </div>
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

        @if(session('SettingsUpdate'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Settings Update Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
