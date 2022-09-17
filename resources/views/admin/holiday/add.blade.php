@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Holiday Management</h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Add Holiday</strong>
                    </div>
                    <div class="card-body">
                    @include('message_data')
                      <form class="needs-validation" novalidate method="post" id="add_holiday_page" name="add_holiday_page" action="{{ route('store_holiday') }}">
                                    @csrf
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="com_name">Title <span class="astrick">*</span></label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title')}}" required>
                            <div class="invalid-feedback">Please enter title</div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="email">Holiday Date<span class="astrick">*</span></label>
                                <input type="text" name="holiday_date" class="form-control" id="datepicker" placeholder="yyyy/mm/dd" value="{{old('holiday_date')}}" required>
                                <div class="invalid-feedback">Please use a valid Date</div>
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
