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
            <th class="text-center">Category</th>
            <th class="text-center">Portfolio_link</th>
            <th class="text-center">Thumbnail</th>
            <th class="text-center">Image</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $key=>$portfolio)
                <tr class="text-center">
                    <th>{{ $portfolios->firstItem() + $key }}</th>
                    <td>{{ $portfolio->category }}</td>
                    <td>{{ $portfolio->portfolio_link }}</td>
                    <td><img src="{{ asset('portfolio/' . $portfolio->thumbnail) }}" width="80px" alt="Thumbnail"></td>
                    <td><img src="{{ asset('portfolio/' . $portfolio->image) }}" width="80px" alt="Image"></td>
                    <td class="d-flex">
                        <a href="{{ route('PortfolioEdit', $portfolio->id) }}" class="btn btn-primary mr-2">Edit</a>
                        <a href="{{ route('PortfolioDelete', $portfolio->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $portfolios->links() }}
    </div><!-- br-section-wrapper -->
    <div class="br-section-wrapper pt-0">
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Deleted List</h6>
        <p class="mg-b-25">Using the most basic table markup.</p>


        <table class="table table-bordered table-colored table-info">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Category</th>
              <th class="text-center">Portfolio_link</th>
              <th class="text-center">Thumbnail</th>
              <th class="text-center">Image</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($trashportfolio as $tportfolio)
                  <tr class="text-center">
                      <th>{{ $loop->index + 1 }}</th>
                      <td>{{ $tportfolio->category }}</td>
                      <td>{{ $tportfolio->portfolio_link }}</td>
                      <td><img src="{{ asset('portfolio/' . $tportfolio->thumbnail) }}" width="80px" alt="Thumbnail"></td>
                      <td><img src="{{ asset('portfolio/' . $tportfolio->image) }}" width="80px" alt="Image"></td>
                      <td class="d-flex">
                          <a href="{{ route('PortfolioRestore', $tportfolio->id) }}" class="btn btn-primary mr-2">Restore</a>
                          <a href="{{ route('PortfolioParmanentDelete', $tportfolio->id) }}" class="btn btn-danger">Parmanent Delete</a>
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

        @if(session('PortfolioDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Portfolio Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('PortfolioRestore'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Portfolio Restore Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
        @if(session('PortfolioParmanentDelete'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Portfolio Parmanent Delete Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
