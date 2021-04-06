


  @extends('layouts.default')

@section('title', 'Danh sách tin tức')

@section('content')
    <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Username</th>
        <th>email</th>
        <th>password</th>
        <th>website</th>
        <th>action</th>
      </tr>
    </thead>

    <tbody>
    @foreach($users as $item)
      <tr>
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['email'] }}</td>
        <td>{{ $item['password'] }}</td>
        <td>{{ $item['website'] }}</td>
       <td> <button type="button" class="btn btn-outline-primary"> <a href="{{ route('dat.edit', $item['id'] )}}">Edit </a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
 



    {!! $users->links() !!}



@endsection