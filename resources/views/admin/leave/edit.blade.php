@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Leave Management</h2>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">View Leave</strong>
                    </div>
                    <div class="card-body">
                    @include('message_data')
                        <form class="needs-validation" novalidate id="edit_form" name="edit_form" action="{{ route('update_leave', $userdata->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf            
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="comp_name">Title <span class="astrick">*</span></label>
                                <input readonly type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{!empty(old('title'))?old('name'):$userdata->title}}">
                                 @if ($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                  @endif
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="leave_date">Leave Date <span class="astrick">*</span></label>
                              <input readonly type="text" class="form-control" id="leave_date" placeholder="Leave Date" name="leave_date" value="{{!empty(old('leave_date'))?old('leave_date'):$userdata->leave_date}}">
                              @if ($errors->has('leave_date'))
                                <div class="invalid-feedback">{{ $errors->first('leave_date') }}</div>
                              @endif
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="address">Leave Description</label>
                                <input readonly id="leave_description" type="text" class="form-control" name="leave_description" placeholder="leave description" value="{{!empty(old('leave_description'))?old('leave_description'):$userdata->leave_description}}">
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                          </div>
                        </div>
                        
                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->   
              </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @endsection