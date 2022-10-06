@extends('users.layout')

 

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
        <form action="/search" method="get">

@method('GET')
@csrf

<div class="input-group align-center col-m-6 " >

<input type="search" name="search" placeholder="Search..." class="form-control col-sm-12 align-center" >
&nbsp;
<input type="submit" class="btn btn-primary btn-m align-left" value="Search"/>
</div>

</form>
    </div>
        <div class="float-right">

            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Product</a>

        </div>
      
    </div>
</div>

@if($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>    
@endif

<br>
    <table class="table table-bordered">
        <tr>

            <th>Id</th>

            <th>FirstName</th>

            <th>LastName</th>

            <th>Email</th>

            <th>Birthday</th>

            <th>Profile</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($allusers as $user)

        <tr>

            <td>{{ $user->id }}</td>

            <td>{{ $user->fname }}</td>

            <td>{{ $user->lname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->bday }}</td>

            <td><img src='{{ $user->profile }}' style="width:100px;"></td>

            <td>
              
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">



                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>



                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>



                @csrf

                @method('DELETE')



                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

    @endforeach

    </table>

    {!! $allusers->links() !!}

      

@endsection
                    