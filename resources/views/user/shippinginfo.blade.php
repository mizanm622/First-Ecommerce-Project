@extends('home.layouts.template')

@section('page-title')
Cart -Ecom
@endsection

@section('main-content')
<section class="container">
    <div class="container-xxl flex-grow-1 container-p-y">

     <!-- Basic Layout -->
     <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Provide Your Shipping Address</h5>

              </div>

          <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{route('storeshippinginfo')}}" method="POST" enctype="multipart/form-data">
                @csrf

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Phone Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Full Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="address" id="address" placeholder="Your Full Address" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Postal Code</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="Post Code" />
                </div>
              </div>


              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
