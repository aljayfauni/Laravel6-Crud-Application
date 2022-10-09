@extends('users.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Users</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>FirstName:</strong>

                {{ $user->fname }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>LastName:</strong>

                {{ $user->lname }}

            </div>

        </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>

            {{ $user->email }}

        </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Birtday:</strong>

            {{ $user->bday }}

        </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

    <strong >profile picture:</strong>

    <img src='../{{ $user->profile }}' style="width:100px;" class='img-profile'  >
   
</div>

</div>
  
    </div>

@endsection