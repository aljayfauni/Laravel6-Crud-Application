@extends('users.layout')

  

@section('content')

<div class="row" >

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New User</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>oops!</strong> erro input!<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('users.add_user') }}" method="POST" enctype="multipart/form-data">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>FirstName:</strong>

                <input type="text" name="fname" class="form-control" placeholder="FirstName">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>LastName:</strong>

                <input type="text" name="lname" class="form-control" placeholder="LastName">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Email:</strong>

                <input type="text" name="email" class="form-control" placeholder="Email">

            </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong>password:</strong>

    <input type="password" name="password" class="form-control" placeholder="Password">

</div>

</div>

            <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Birthday:</strong>

                <input type="date" name="bday"  class="form-control" placeholder="Birthday">

            </div>

            </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Upload Profile:</strong>

                <input type="file" name="profile"  class="form-control" >

            </div>

            </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>

@endsection