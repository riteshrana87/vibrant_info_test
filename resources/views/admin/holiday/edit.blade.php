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
                      <strong class="card-title">Edit Holiday</strong>
                    </div>
                    <div class="card-body">
                    @include('message_data')
                        <form class="needs-validation" novalidate id="edit_form" name="edit_form" action="{{ route('update_holiday', $userdata->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf            
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="comp_name">Title <span class="astrick">*</span></label>
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{!empty(old('title'))?old('title'):$userdata->title}}">
                                 @if ($errors->has('company_name'))
                                    <div class="invalid-feedback">{{ $errors->first('company_name') }}</div>
                                  @endif
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="email">Holiday Date <span class="astrick">*</span></label>
                              <input type="text" class="form-control" id="holiday_date" placeholder="Holiday Date" name="holiday_date" value="{{!empty(old('holiday_date'))?old('holiday_date'):$userdata->holiday_date}}">
                              @if ($errors->has('holiday_date'))
                                <div class="invalid-feedback">{{ $errors->first('holiday_date') }}</div>
                              @endif
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