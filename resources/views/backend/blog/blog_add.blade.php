@extends('backend.master')
@section('blog')
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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Title: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <input type="text" name="title" class="form-control" placeholder="Enter Title Here">
                </div>
            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Sub Title: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="text" name="subtitle" class="form-control" placeholder="Enter Subtitle Name">
              </div>

            </div><!-- row -->
            <div class="row mg-t-20">
              <label class="col-sm-3 form-control-label">Service Name: <span class="tx-danger">*</span></label>
              <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <input type="text" name="servicename" class="form-control" placeholder="Enter Service Name">
              </div>
            </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Description: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="text" name="description" class="form-control" placeholder="Enter description">
                </div>
              </div>
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label">Icon: <span class="tx-danger">*</span></label>
                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                  <input type="file" name="icon" class="form-control">
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
