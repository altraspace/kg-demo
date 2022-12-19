@extends('layout')

  

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>

  

                <div class="card-body">

                    @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif

  

                   <h3> Profile Details :- </h3>

                    <table>
                        <tr>
                            <td>First Name : </td>
                            <td>{{$user->first_name}}</td>
                        </tr>
                        <tr>
                            <td>Last Name : </td>
                            <td>{{$user->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Contact Number : </td>
                            <td>{{$user->contact_no}}</td>
                        </tr>
                        <tr>
                            <td>Email ID : </td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>Address : </td>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <td>Country : </td>
                            <td>{{$user->country->name}}</td>
                        </tr>
                        <tr>
                            <td>State : </td>
                            <td>{{$user->state->name}}</td>
                        </tr>
                        <tr>
                            <td>City : </td>
                            <td>{{$user->city->name}}</td>
                        </tr>
                        <tr>
                            <td>Username : </td>
                            <td>{{$user->username}}</td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection