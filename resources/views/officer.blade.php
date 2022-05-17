
  @extends('shared.layout')
  @section('content')
      
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      {{ $message }}
  </div>
@endif

{{-- appointment dal for officer --}}
<div class="modal fade" id="appointmentBtn2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Appointments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <table class="table">
              <thead>
                  <tr>
                      <th>SN</th>
                      <th>Officer Name</th>
                      <th>Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Status</th>
                  </tr>
              </thead>
              {{-- <tbody id="visitorAppointmentTbl"> --}}

              {{-- </tbody> --}}
              
          </table>
      </div>

      </div>

    </div>
  </div>
</div>

{{-- modal for updating officer --}} 
<div class="modal fade" id="updateOfficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Officer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('getOfficerDetail')}}">
          @csrf
          @method('put')
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <input type="hidden" name="officer_id" id="officer_id">
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="new_first_name" id="firstName" class="form-control"/>
                <label class="form-label" for="form6Example1">First name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="new_last_name" id="lastName" class="form-control" />
                <label class="form-label" for="form6Example2">Last name</label>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="time" name="new_work_start_time" id="startTime" class="form-control" />
                <label class="form-label" for="form6Example1">Start Time</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="time" name="new_work_end_time" id="endTime" class="form-control" />
                <label class="form-label" for="form6Example2">End Time</label>
              </div>
            </div>

            <div class="col">
              <div class="form-outline">
                <input type="text" name="new_post" id="post" class="form-control" />
                <label class="form-label" for="form6Example2">Post</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-check form-check-inline form-group">
                <label>Work Days</label>
                <div class="input-group">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="sunday" value="sunday">
                        <label class="form-check-label" for="sunday">Sun</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="monday" value="monday">
                        <label class="form-check-label" for="monday">Mon</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="tuesday" value="tuesday">
                        <label class="form-check-label" for="tuesday">Tue</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="wednesday" value="wednesday">
                        <label class="form-check-label" for="wednesday">Wed</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="thursday" value="thursday">
                        <label class="form-check-label" for="thursday">Thur</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="friday" value="friday">
                        <label class="form-check-label" for="friday">Fri</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="saturday" value="saturday">
                        <label class="form-check-label" for="saturday">Sat</label>
                    </div>
                </div>
            </div>
        </div>

          <button type="submit"  class="btn btn-primary">Update Officer</button>
        </form>

      </div>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addOfficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Officer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('officerAdd')}}">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="first_name" id="first_name" class="form-control" />
                <label class="form-label" for="form6Example1">First name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="last_name" id="last_name" class="form-control" />
                <label class="form-label" for="form6Example2">Last name</label>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="time" name="work_start_time" id="work_start_time" class="form-control" />
                <label class="form-label" for="form6Example1">Start Time</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="time" name="work_end_time" id="work_end_time" class="form-control" />
                <label class="form-label" for="form6Example2">End Time</label>
              </div>
            </div>
          </div>
        
          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="post" id="post" class="form-control" />
            <label class="form-label" for="form6Example3">Post</label>
          </div>
          <div class="row">
            <div class="form-check form-check-inline form-group">
                <label>Work Days</label>
                <div class="input-group">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="sunday" value="sunday">
                        <label class="form-check-label" for="sunday">Sun</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="monday" value="monday">
                        <label class="form-check-label" for="monday">Mon</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="tuesday" value="tuesday">
                        <label class="form-check-label" for="tuesday">Tue</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="wednesday" value="wednesday">
                        <label class="form-check-label" for="wednesday">Wed</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="thursday" value="thursday">
                        <label class="form-check-label" for="thursday">Thur</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="friday" value="friday">
                        <label class="form-check-label" for="friday">Fri</label>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="days[]" id="saturday" value="saturday">
                        <label class="form-check-label" for="saturday">Sat</label>
                    </div>
                </div>
            </div>
        </div>
          <button type="submit" class="btn btn-primary">Add Officer</button>
        </form>

      </div>

    </div>
  </div>
</div>
        
<div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <tr>
                        <div class="d-flex flex-row justify-content-between">
                          
                          <a class="btn btn-secondary align-self-center d-block" data-toggle="modal" data-target="#addOfficer">add officer</a>
                      </div>
                      </tr>
                      <br>
                      <thead>
                        <tr>
                            <th>id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Post</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $count = 1; ?>

                        @foreach ($value as $data)
                        <tr>
                          <td>{{$count}}</td>
                          <td>{{$data->first_name}}</td>
                          <td>{{$data->last_name}}</td>
                          <td>{{$data->post}}</td>
                          <td>{{$data->work_start_time}}</td>
                          <td>{{$data->work_end_time}}</td>
                          {{-- <td>{{$data->status}}</td> --}}
                        <td>  <?php if($data->officer_status == 'active'){ ?> 
                            <form action="status_update" method="post" id="submitform">
                              @csrf
                              @method('put')
                              <button class="btn btn-success" id="submit" name="submit" value="{{$data->officer_id}}">Active</button>
                            </form>
                          <?php }else{ ?> 
                            <form action="status_update" method="post" id="submitform">
                              @csrf
                              @method('put')
                              <button class="btn btn-danger" id="submit" name="submit" value="{{$data->officer_id}}">InActive</button>
                            </form>
                          <?php } ?>
                        </td>
                          <td>
                          <button class="btn btn-outline-primary" id="updatebtn" data-toggle="modal" data-target="#updateOfficer"  onclick="showUpdateModal('{{$data}}')">Update</button>
                          <script>
                              function showUpdateModal(strdata){
                                let data = JSON.parse(strdata);
                                     console.log(data);
                                     $("#officer_id").val(data.officer_id);
                                     $("#firstName").val(data.first_name);
                                     $("#lastName").val(data.last_name);
                                     $("#startTime").val(data.work_start_time);
                                     $("#endTime").val(data.work_end_time);
                                     $("#post").val(data.post);
                                    
                                 }
                          </script>
                          <button class="btn btn-outline-primary" data-toggle="modal" data-target="#appointmentBtn2">Appointment</button>
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
    $(#submit).on('click',function(){
      $(#submitform).submit();
    });
  });


</script>
@endsection
  




