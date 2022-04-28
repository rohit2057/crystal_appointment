
  @extends('shared.layout')
  @section('content')
      
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      {{ $message }}
  </div>
@endif

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
                <input type="text" name="work_start_time" id="work_start_time" class="form-control" />
                <label class="form-label" for="form6Example1">Start Time</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text" name="work_end_time" id="work_end_time" class="form-control" />
                <label class="form-label" for="form6Example2">End Time</label>
              </div>
            </div>
          </div>
        
          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="post" id="post" class="form-control" />
            <label class="form-label" for="form6Example3">Post</label>
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
                        @foreach ($value as $data)
                        <tr>
                          <td>{{$data->officer_id}}</td>
                          <td>{{$data->first_name}}</td>
                          <td>{{$data->last_name}}</td>
                          <td>{{$data->post}}</td>
                          <td>{{$data->work_start_time}}</td>
                          <td>{{$data->work_end_time}}</td>
                          {{-- <td>{{$data->status}}</td> --}}
                        <td>  <?php if($data->status == 'active'){ ?> 
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
                          <button class="btn btn-outline-primary">Update</button>
                          <button class="btn btn-outline-primary">Appointment</button>
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
<script>
  $(document).ready(function(){
    $(#submit).on('click',function(){
      $(#submitform).submit();
    });
  });

</script>
@endsection
  




