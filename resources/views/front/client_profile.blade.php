@extends('front/layouts.master')

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="">Home</a></li>
                        <li>Profile</li>
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
                <form id="edit_profile" name="edit_profile" class="card login-form inner-content" method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3>Profile</h3>
                            </div>
                            <div class="input-head">
                                
                                <div class="form-group input-group">
                                    <label><i class="lni lni-user"></i></label>
                                    <input class="form-control" name="name" type="text" placeholder="Your name" value="{{ !empty($user['name']) ? $user['name'] : '' }}" required>
                                </div>
                                <div class="form-group input-group">
                                    <label><i class="lni lni-envelope"></i></label>
                                    <input class="form-control" name="email" type="email" placeholder="Your email" value="{{ !empty($user['email']) ? $user['email'] : '' }}" required>
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
