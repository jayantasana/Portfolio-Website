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
        <div class="col-xl-10 m-auto">
          <div class="form-layout form-layout-4">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Basic Setting</h6><hr>
            <form action="{{ route('SettingsStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <label class="col-sm-3 form-control-label">Logo: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="file" name="logo" class="form-control">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="text" name="meta_tag" class="form-control" placeholder="Enter Meta Tag">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Name: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="text" name="name" class="form-control" placeholder="Enter firstname">
              </div>

            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Email: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="email" name="email" class="form-control" placeholder="Enter email address">
              </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Phone: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" name="address" class="form-control" placeholder="Enter your address"></textarea>
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Birthday: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="date" name="birthday" class="form-control" placeholder="Enter Date of Birth">
                </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Website: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="url" name="website" class="form-control" placeholder="Enter Website URL">
                </div>
            </div>
            <div id="socialGroup">
            <div class="row mg-t-20 socialField">
                <label class="col-sm-3 form-control-label">Social Link: <span class="tx-danger">*</span></label>
                <div class="col-sm-2 mg-t-10 mg-sm-t-0">
                    <select name="social_id[]" id="" class="form-control">
                        @foreach ($socials as $item)
                            <option value="{{ $item->id }}">{{ $item->socialname }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                  <input type="url" name="social[]" class="form-control" placeholder="Enter Social Link">
                </div>
                <div class="col-sm-3 mg-t-10 mg-sm-t-0">
                    <input type="url" name="icon[]" class="form-control" placeholder="Enter Social Link">
                    <a href="#" class="btn btn-warning addField"><i class="fa fa-plus"></i></a>
                  </div>

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
  <style>

        .socialField{
            position: relative;

        }

      .addField{
          position: absolute;
          top: 0;
          right: 13px;
      }
  </style>
@endsection

@section('footer_js')
  <script>
      $('.addField').click(function(){
          var newField = $(document.createElement('div')).attr('class', 'form-group');
          newField.after().html('<div class="row mg-t-20 socialField"><label class="col-sm-3 form-control-label">Social Link: <span class="tx-danger">*</span></label><div class="col-sm-2 mg-t-10 mg-sm-t-0"> <select name="social_id[]" id="" class="form-control">  @foreach ($socials as $item) <option value="{{ $item->id }}">{{ $item->socialname }}</option> @endforeach </select> </div><div class="col-sm-4 mg-t-10 mg-sm-t-0"><input type="url" name="social[]" class="form-control" placeholder="Enter Social Link"></div><div class="col-sm-3 mg-t-10 mg-sm-t-0"><input type="url" name="icon[]" class="form-control" placeholder="Enter Social Link"></div>');
          newField.appendTo('#socialGroup');
      })
  </script>

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

        @if(session('SettingsStore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Settings Added Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

    </script>


@endsection
