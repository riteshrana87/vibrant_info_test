@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Employees Management</h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Add Employees</strong>
                    </div>
                    <div class="card-body">
                    @include('message_data')
                      <form class="needs-validation" novalidate method="post" id="add_employees_page" name="add_employees_page" action="{{ route('store_employees') }}">
                                    @csrf
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="com_name">Name <span class="astrick">*</span></label>
                            <input type="text" name="name" class="form-control" id="com_name" placeholder="Name" value="{{old('username')}}" required>
                            <div class="invalid-feedback">Please enter name</div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="email">Email id <span class="astrick">*</span></label>
                                <input type="text" name="email" class="form-control validateEmail" id="email" placeholder="Email id" value="{{old('email')}}" required>
                                <div class="invalid-feedback">Please use a valid email</div>
                                    
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="password">Password <span class="astrick">*</span></label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{old('password')}}" required>
                                <div class="invalid-feedback">Please enter password</div>
                                
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="confirm_password">Confirm Password <span class="astrick">*</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="confirm_password" required autocomplete="new-password" value="{{old('confirm_password')}}">
                                <div class="invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                                
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                                <input id="address" type="text" class="form-control" name="address" placeholder="Address"  value="{{old('address')}}">
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control onlynum" name="phone" placeholder="Phone" value="{{old('phone')}}">
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="phone">DOB</label>
                              <input id="dob" type="text" class="form-control onlynum" name="dob" placeholder="DOB" value="{{old('dob')}}">
                              <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                              
                      </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->   
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @endsection
