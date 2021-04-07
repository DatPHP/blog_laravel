


  @extends('layouts.default')

@section('title', 'Danh sách tin tức')

@section('content')

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('user.create')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Create new Account</a>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>email</th>
            <th>password</th>
            <th>website</th>
            <th  colspan="4">Action</th>
        </tr>
    </thead>
    @foreach($users as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['password'] }}</td>
                <td>{{ $item['website'] }}</td>
                <td colspan="4">
                <button type="button" class="btn btn-outline-secondary"><a href="{{ route('user.edit', $item['id'] )}}"> Edit</button>
                <button type="button" class="btn btn-outline-danger"><a href="{{ route('user.delete', $item['id'] )}}"> Delete </a></button>
                </td>
            </tr>
            @endforeach



           
    </table>
    </div>
</div>

  </table>
  {!! $users->links() !!}
@endsection


