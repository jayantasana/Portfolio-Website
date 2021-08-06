@extends('backend.master')
@section('blog')
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
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
                <tr class="text-center">
                    <th></th>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td class="d-flex">
                        <a href="" class="btn btn-primary mr-2">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
        </tbody>
      </table>
    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
@endsection
