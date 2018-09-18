<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Appointments</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Passport Office</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($appointments as $appointment)
      @php
        $date=date('Y-m-d', $appointment['date']);
        @endphp
      <tr>
        <td>{{$appointment['id']}}</td>
        <td>{{$appointment['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$appointment['email']}}</td>
        <td>{{$appointment['number']}}</td>
        <td>{{$appointment['office']}}</td>
        
        <td><a href="{{action('Passport\PassportController@edit', $appointment['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('Passport\PassportController@destroy', $appointment['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>