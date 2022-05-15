@extends('shared.layout')
@section('content')



@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      {{ $message }}
  </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

{{-- add activity model --}}

    <div class="modal fade" id="addActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Officer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('activityAdd')}}">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  
                  <label class="form-label" for="form6Example1">Officer name</label>
                  <select class="form-select" searchable="Search here.." name="o_id">
                    <option  disabled selected>Select Officer</option>
                    @foreach ( $value['b'] as $res)
                        @if ($res->officer_status == 'inactive')
                        {
                        }@else
                        {       
                            <option value="{{$res->officer_id}}">{{$res->first_name}} {{$res->last_name}}</option>
                        }
                        @endif
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  
                  <label class="form-label" for="form6Example2">Visitor name</label>
                  <select class=" chosen form-select" searchable="Search here.." name="visitor_id" value="null">
                    <option value="" selected>Select Visitor</option>
                    @foreach ( $value['c'] as $res)
                    @if ($res->v_status == 'inactive')
                        {
                        }@else
                        { 
                            <option value="{{$res->v_id}}">{{$res->v_name}}</option>
                        }
                        @endif
                    @endforeach
                </select>
                </div>
              </div>
            </div>
  
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" name="name" id="name" class="form-control" />
                  <label class="form-label" for="form6Example1">Name</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="date" name="date" id="date" class="form-control" />
                  <label class="form-label" for="form6Example2">date</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="time" name="start_time" id="start_time" class="form-control" />
                  <label class="form-label" for="form6Example1">start time</label>
                </div>
              </div>
              <div class="col">
                <div class="form-outline">
                  <input type="time" name="end_time" id="end_time" class="form-control" />
                  <label class="form-label" for="form6Example2">End Time</label>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <label for="type">Type</label>
                  <select class="form-control" name="type" id="type">
                    <option>Appointment</option>
                    <option>Leave</option>
                    <option>Break</option>
                  </select>
              </div>
          </div>
            <button type="submit" class="btn btn-primary">Add Activity</button>
          </form>
  
        </div>
  
      </div>
    </div>
  </div>

  {{-- modal for updating activity --}} 
<div class="modal fade" id="updateActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('updateActivity')}}">
          @csrf
          @method('put')
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <input type="hidden" name="new_activity_id" id="new_activity_id">
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                
                <label class="form-label" for="form6Example1">Officer name</label>
                <select class="form-select" searchable="Search here.." name="new_o_id">
                  <option  disabled selected>Select Officer</option>
                  @foreach ( $value['b'] as $res)
                      @if ($res->officer_status == 'inactive')
                      {
                      }@else
                      {       
                          <option value="{{$res->officer_id}}">{{$res->first_name}} {{$res->last_name}}</option>
                      }
                      @endif
                  @endforeach
              </select>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                
                <label class="form-label" for="form6Example2">Visitor name</label>
                <select class=" chosen form-select" searchable="Search here.." name="new_visitor_id" value="null">
                  <option value="" selected>Select Visitor</option>
                  @foreach ( $value['c'] as $res)
                  @if ($res->v_status == 'inactive')
                      {
                      }@else
                      { 
                          <option value="{{$res->v_id}}">{{$res->v_name}}</option>
                      }
                      @endif
                  @endforeach
              </select>
                
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="time" name="new_start_time" id="new_start_time" class="form-control" />
                <label class="form-label" for="form6Example1">Start Time</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="time" name="new_end_time" id="new_end_time" class="form-control" />
                <label class="form-label" for="form6Example2">End Time</label>
              </div>
            </div>
        </div>
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" name="new_name" id="new_name" class="form-control" />
              <label class="form-label" for="form6Example1">Name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-outline">
              <input type="date" name="new_date" id="new_date" class="form-control" />
              <label class="form-label" for="form6Example2">date</label>
            </div>
          </div>
        </div>  

          <button type="submit"  class="btn btn-primary">Update Visitor</button>
        </form>

      </div>

    </div>
  </div>
</div>


     <div class="card">
       
        <div class="card-body">
          
          <div class="row">
            
              <form action="" >
                @csrf
                <input type="hidden" name="filter_key" id="filter_key" value="officer">
                <input class="form-control" type="text" name="search" id="search" autocomplete="off" placeholder="Search">
            </form>
            
            <div class="col-12">
              
              <div class="table-responsive">
                <table id="order-listing" class="table">
                    <tr>
                        <div class="d-flex flex-row justify-content-between">
                          
                          <a class="btn btn-secondary align-self-center d-block" data-toggle="modal" data-target="#addActivity">Add Activity</a>
                        </div>
                    </tr>
                  <thead>
                    <tr>
                        <th>SN</th>
                        <th>Officer Name</th>
                        <th>Visitor Name</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; ?>
                    @foreach  ($value['a'] as $item)
                   
                    <tr>
                      <td>{{$item->activity_id}}</td>
                      <td>{{$item->first_name}}  {{$item->last_name}}</td>
                      <td>{{$item->v_name}}</td>
                      <td>{{$item->name}}</td>
                      @if ($item->type == 'appointment')
                      <td>
                          <button class="btn btn-primary btn-sm">Appointment</button>
                      </td>
                      @elseif ($item->type == 'leave')
                      <td>
                          <button class="btn btn-danger btn-sm">Leave</button>
                      </td>
                      @elseif($item->type == 'break')
                      <td>
                          <button class="btn btn-warning btn-sm">Break</button>
                      </td>
                      @endif 
                      
                      @if ($item->status == 'active')
                      <td>
                          <form action="{{route('activity_update')}}" method="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input name="_method" type="hidden" value="PUT">
                              <input type="hidden" name="officer_id" id="officer_id" value="{{$item->o_id}}">
                              <input type="hidden" name="visitor_id" id="visitor_id" value="{{$item->visitor_id}}">
                              <input type="hidden" name="activity_id" id="activity_id" value="{{$item->activity_id}}">
                              <input type="hidden" name="status_value" id="status_value" value="{{$item->status}}">
                              <button class="btn btn-sm btn-success">Active</button>
                          </form>
                      </td>
                          
                      @elseif($item->status == 'inactive')
                          <td>
                              <form action="{{route('activity_update')}}" method="POST">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input name="_method" type="hidden" value="PUT">
                                  <input type="hidden" name="officer_id" id="officer_id" value="{{$item->o_id}}">
                                  <input type="hidden" name="visitor_id" id="visitor_id" value="{{$item->visitor_id}}">
                                  <input type="hidden" name="activity_id" id="activity_id" value="{{$item->activity_id}}">
                                  <input type="hidden" name="status_value" id="status_value" value="{{$item->status}}">
                              <button class="btn btn-sm btn-danger">InActive</button>
                              </form>
                          </td>
                      @elseif($item->status == 'cancelled')
                          <td>
                              <button class="btn btn-sm btn-warning">Cancelled</button>
                          </td>
                      @endif
                      <td>{{$item->date}}</td>
                      <td>{{$item->start_time}}</td>
                      <td>{{$item->end_time}}</td>
                      <td>
                       <div class="row">
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateActivity" id="update_activity" name="update_activity"  value="{{$item->activity_id}}">update</button>
                      
                          <form action="{{route('cancelActivity')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input name="_method" type="hidden" value="PUT">
                            <button class="btn btn-sm btn-danger" name="activity_id"  value="{{$item->activity_id}}">Cancel</button>
                          </form>
                        </div>
                     </td>
                    </tr>
                    <?php $count++ ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function(){
        $(document).on('click','#update_activity',function(){
            var user_id = $(this).val();
            
            $.ajax({
                type:"GET",
                url:"getActivityDetail/"+user_id,
                success:function(response){
                  
                    dataActivity = response.activity;
                    $.each(dataActivity,function(index,item){
                        $('#new_activity_id').val(item.activity_id);
                        $('#new_name').val(item.name);
                        $('#new_date').val(item.date);
                        $('#new_start_time').val(item.start_time);
                        $('#new_end_time').val(item.end_time);
                    });
                    
                    dataOfficer = response.officername;
                    $.each(dataOfficer,function(index,item){
                        var officer_name = item.first_name+" "+item.last_name ;
      
                        $("select option").each(function(){
                            if ($(this).text() == officer_name)
                              $(this).attr("selected","selected");
                          });
      
                    });
      
                    dataVisitor = response.visitorname;
                    $.each(dataVisitor,function(index,item){
                        var visitor_name = item.v_name;
                        $("select option").each(function(){
                            if ($(this).text() == visitor_name)
                              $(this).attr("selected","selected");
                          });
                    });  
                }
            });
        });
      });
        </script>


@endsection