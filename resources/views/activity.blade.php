@extends('shared.layout')
@section('content')


    
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                    <tr>
                        <div class="d-flex flex-row justify-content-between">
                          
                            <a class="btn btn-secondary align-self-center d-block" data-toggle="modal" data-target="#">add new activity</a>
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
                          <form action="" method="POST">
                              @csrf
                              @method('put')
                              <input type="hidden" name="officer_id" id="officer_id" value="{{$item->officer_id}}">
                              <input type="hidden" name="visitor_id" id="visitor_id" value="{{$item->v_id}}">
                              <input type="hidden" name="activity_id" id="activity_id" value="{{$item->activity_id}}">
                              <input type="hidden" name="status_value" id="status_value" value="{{$item->status}}">
                              <button class="btn btn-sm btn-success">Active</button>
                          </form>
                      </td>
                          
                  @elseif($item->status == 'inactive')
                      <td>
                          <form action="" method="POST">
                              @csrf
                              @method('put')
                              <input type="hidden" name="officer_id" id="officer_id" value="{{$item->officer_id}}">
                              <input type="hidden" name="visitor_id" id="visitor_id" value="{{$item->v_id}}">
                              <input type="hidden" name="activity_id" id="activity_id" value="{{$item->activity_id}}">
                              <input type="hidden" name="status_value" id="status_value" value="{{$item->status}}">
                          <button class="btn btn-sm btn-danger">InActive</button>
                          </form>
                      </td>
                  @else
                      <td>
                          <button class="btn btn-sm btn-warning">Cancelled</button>
                      </td>
                  @endif
                      <td>{{$item->date}}</td>
                      <td>{{$item->start_time}}</td>
                      <td>{{$item->end_time}}</td>
                      <td>
                       <div class="row">
                          <button class="btn btn-outline-primary col-6">update</button>
                          <button class="btn btn-outline-primary col-6">cancel</button>
                        </div>
                     </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    


@endsection