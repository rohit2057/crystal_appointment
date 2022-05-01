@extends('shared.layout')
@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      {{ $message }}
  </div>
@endif

 {{-- modal for Update --}}
 <div class="modal fade" id="updateVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Visitor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('getVisitorDetail')}}">
          @csrf
          @method('put')
          
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <input type="hidden" name="new_v_id" id="new_v_id">
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="new_v_name" id="new_v_name" class="form-control" />
                <label class="form-label" for="form6Example1">Full Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="contact" name="new_v_contact" id="new_v_contact" class="form-control" />
                <label class="form-label" for="form6Example2">contact</label>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="email" name="new_v_email" id="new_v_email" class="form-control" />
                <label class="form-label" for="form6Example1">email</label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update Visitor</button>
        </form>

      </div>

    </div>
  </div>
</div> 

{{-- modal for insert --}}

<div class="modal fade" id="addVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Officer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('visitorAdd')}}">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" name="v_name" id="first_name" class="form-control" />
                <label class="form-label" for="form6Example1">Full Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="contact" name="v_contact" id="v_contact" class="form-control" />
                <label class="form-label" for="form6Example2">contact</label>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="email" name="v_email" id="v_email" class="form-control" />
                <label class="form-label" for="form6Example1">email</label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add Visitor</button>
        </form>

      </div>

    </div>
  </div>
</div> 

    <div class="card">
      <div class="card-body">
         <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <tr>
                  <div class="d-flex flex-row justify-content-between">
                          
                    <a class="btn btn-secondary align-self-center d-block" data-toggle="modal" data-target="#addVisitor">Add Visitor</a>
                  </div>
                </tr>
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Actions</th>
                     
                  </tr>
                </thead>
                <tbody>
                  @foreach ($value as $data)
                  <tr>
                    <td>{{$data->v_id}}</td>
                    <td>{{$data->v_name}}</td>
                    <td>{{$data->v_contact}}</td>
                    <td>{{$data->v_email}}</td>
                    {{-- <td>{{$data->v_status}}</td> --}}

                    <td>  <?php if($data->v_status == 'active'){ ?> 
                      <form action="visitor_update" method="post" id="submitform">
                        @csrf
                        @method('put')
                        <button class="btn btn-success" id="submit" name="submit" value="{{$data->v_id}}">Active</button>
                      </form>
                    <?php }else{ ?> 
                      <form action="visitor_update" method="post" id="submitform">
                        @csrf
                        @method('put')
                        <button class="btn btn-danger" id="submit" name="submit" value="{{$data->v_id}}">InActive</button>
                      </form>
                    <?php } ?>
                  </td>
                    
                 <td>   <button class="btn btn-outline-primary"data-toggle="modal" data-target="#updateVisitor" onclick="showUpdateModal('{{$data}}')">Update</button>
                  <script>
                    function showUpdateModal(strdata){
                      let data = JSON.parse(strdata);
                           console.log(data);
                           $("#new_v_id").val(data.v_id);
                           $("#new_v_name").val(data.v_name);
                           $("#new_v_contact").val(data.v_contact);
                           $("#new_v_email").val(data.v_email);
                           
                          
                       }
                </script>
                   <button class="btn btn-outline-primary">Appointment</button> </td>
                    
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