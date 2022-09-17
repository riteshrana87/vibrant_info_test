@extends('front/layouts.master')
@section('content')
<!-- Start Hero Area -->
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Leave</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{url('/front/dashboard')}}">Dashboard</a></li>
                        <li>Leave</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
      <!-- Start Pricing Table Area -->
     <section id="pricing" class="pricing-table section">
        <div class="container">
        <div class="row">
        <!-- Alert messages code start here -->	
        @include('message_data')	
            <!-- Alert messages code end here -->
                <!-- Striped rows -->
                <div class="col-md-12 my-4">
                  <h2 class="h4 mb-1">Leave</h2>
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="toolbar row mb-3">
                            <div class="col">
                                <form class="form-inline">
                                    <div class="form-row row">
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="col ml-auto">
                                <div class="dropdown float-right">
                                     <a href="{{url('/front/add_leave')}}" style="float: right;" class="btn btn-primary float-right ml-3">Add Leave</a>
                            </div>
                        </div> 
                    </div>

                    
                      <!-- table -->
                      <table class="table table-bordered">
                        <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($leaves) != 0)
                                <?php $i = 1;?>
                                @foreach ($leaves as $value)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->leave_date}}</td>
                                        <td>{{$value->leave_description}}</td>
                                    </tr>
                                <?php $i++; ?>
                                @endforeach 
                                @else
                                <tr>
                                    <td colspan="3">
                                        <p class="font-weight-bold mb-1 text-center">No record found.</p>
                                    </td>
                                </tr>
                                
                            @endif  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
    </section>
    <!--/ End Pricing Table Area -->
@endsection    