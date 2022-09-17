@extends('front/layouts.master')

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Add Leave</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="">Home</a></li>
                        <li>Add Leave</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

        <!-- Start Account Signup Area -->
        <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <!-- Alert messages code start here -->	
                    @include('message_data')	
                <!-- Alert messages code end here -->
                <form id="add_book" name="add_Leave" class="card login-form inner-content" method="POST" action="{{ route('leave.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Add Leave</h3>
                            </div>
                            <div class="input-head">
                                <div class="form-group input-group">
                                    <label></label>
                                    <input class="form-control" name="title" type="text" placeholder="Title" value="{{ old('title') }}" required>
                                </div>
                                
                                <div class="form-group input-group">
                                    <label></label>
                                    <input class="form-control nolink" name="leave_date" type="text" placeholder="yyyy/mm/dd" value="{{ old('leave_date') }}">
                                </div>

                                <div class="form-group input-group">
                                    <label></label>
                                    <input class="form-control" name="leave_description" type="text" placeholder="leave description"  value="{{ old('leave_description') }}">
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Signup Area -->

   

@endsection
