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
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                 

                    <tr>
                      <td>New York</td>
                      <td>New York</td>
                      <td>New York</td>
                      <td>New York</td>
                      <td>New York</td>
                      <td>New York</td>
                        <td>New York</td>
                        <td>$1500</td>
                        <td>$3200</td>
                        <td>
                          <label class="badge badge-info">On hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">View</button>
                        </td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    


@endsection