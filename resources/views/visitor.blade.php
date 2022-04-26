@extends('shared.layout')
@section('content')



    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data table</h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Customer</th>
                      <th>Contact Number</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>1</td>
                      <td>2012/08/03</td>
                      <td>Edinburgh</td>
                      <td>New York</td>
                      <td>$3200</td>
                      <td>
                        <label class="badge badge-info">On hold</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">Update</button>
                        <button class="btn btn-outline-primary">Appointment</button>
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>2015/04/01</td>
                      <td>Doe</td>
                      <td>Brazil</td>
                      <td>$7500</td>
                      <td>
                        <label class="badge badge-danger">Pending</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">Update</button>
                        <button class="btn btn-outline-primary">Appointment</button>
                      </td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>2010/11/21</td>
                      <td>Sam</td>
                      <td>Tokyo</td>
                      <td>$6300</td>
                      <td>
                        <label class="badge badge-success">Closed</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">Update</button>
                        <button class="btn btn-outline-primary">Appointment</button>
                      </td>
                  </tr>
                  <tr>
                      <td>4</td>
                      <td>2016/01/12</td>
                      <td>Sam</td>
                      <td>Tokyo</td>
                      <td>$6300</td>
                      <td>
                        <label class="badge badge-success">Closed</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">Update</button>
                        <button class="btn btn-outline-primary">Appointment</button>
                      </td>
                  </tr>
                  <tr>
                      <td>5</td>
                      <td>2017/12/28</td>
                      <td>Sam</td>
                      <td>Tokyo</td>
                      <td>$6300</td>
                      <td>
                        <label class="badge badge-success">Closed</label>
                      </td>
                      <td>
                        <button class="btn btn-outline-primary">Update</button>
                        <button class="btn btn-outline-primary">Appointment</button>
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