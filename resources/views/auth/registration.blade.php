@extends('layout')

  

@section('content')

<main class="login-form">

  <div class="cotainer">

      <div class="row justify-content-center">

          <div class="col-md-8">

              <div class="card">

                  <div class="card-header">LARAVEL DEVELOPER ASSIGNMENT</div>

                  <div class="card-body">

  

                      <form id="register-form">

                          @csrf

                          <div class="form-group row">

                              <label for="name" class="col-md-4 col-form-label text-md-right">User Name:</label>

                              <div class="col-md-3">

                                  <input type="text" id="first_name" class="form-control" name="first_name" placeholder="First Name" autofocus>

                              </div>

                              <div class="col-md-3">

                                  <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last Name" autofocus>

                              </div>

                          </div>

  
                          <div class="form-group row">

                              <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact Number:</label>

                              <div class="col-md-6">

                                  <input type="text" id="contact_no" class="form-control" name="contact_no"  autofocus>
                                   <span id="lblError" class="spl_error">Invalid Contact Number.</span>
                              </div>

                          </div>

                          <div class="form-group row">

                              <label for="email" class="col-md-4 col-form-label text-md-right">Email ID:</label>

                              <div class="col-md-6">

                                  <input type="text" id="email" class="form-control" name="email"  autofocus>

                              </div>

                          </div>

                          <div class="form-group row">

                              <label for="address" class="col-md-4 col-form-label text-md-right">Address:</label>

                              <div class="col-md-6">

                                  <textarea id="address" class="form-control" name="address"  autofocus></textarea>

                              </div>

                          </div>

                          <div class="form-group row">
                              <div class="col-md-4">
                              <label for="country_id" class="col-md-12 col-form-label text-md-right">Country</label>
                                  <select id="country_id" class="form-control" name="country_id" onchange="countryChange()"  autofocus>
                                    <option value="">Select Country</option>
                                    @foreach($countries AS $row)
                                      <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                  </select>

                              </div>
                              <div class="col-md-4">
                              <label for="state_id" class="col-md-12 col-form-label text-md-right">State</label>
                                  <select id="state_id" class="form-control" name="state_id" onchange="stateChange()"  autofocus>
                                    <option value="">Select State</option>
                                  </select>

                              </div>
                              <div class="col-md-4">
                              <label for="city_id" class="col-md-12 col-form-label text-md-right">City</label>
                                  <select id="city_id" class="form-control" name="city_id"  autofocus>
                                    <option value="">Select City</option>
                                  </select>

                              </div>

                          </div>

                          <div class="form-group row">

                              <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>

                              <div class="col-md-6">

                                  <input type="text" id="username" class="form-control" name="username"  autofocus>

                              </div>

                          </div>

                          <div class="form-group row">

                              <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                              <div class="col-md-6">

                                  <input type="password" id="password" class="form-control" name="password" >

                              </div>

                          </div>

                          <div class="col-md-6 offset-md-4">

                              <button type="button" onclick="register()" class="btn btn-primary">

                                  Sign Up

                              </button>

                          </div>

                      </form>

                        

                  </div>

              </div>

          </div>

      </div>

  </div>

</main>

@endsection


 <script src="{{ asset('js/registration.js')}}" type="text/javascript"></script>