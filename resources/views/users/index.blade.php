@extends('layouts.app')
@section('content')
 <div class="card-default">
        <div class="card-header">User</div>
        <div class="card-body">
        @if($users->count() > 0)
                <table class="table">
                        <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        
                        </thead>       
                <tbody>
                @foreach ($users as $user)
                <tr>    
                        <td><img style="width:40px;height:40px; border-radius:50%;"src=" {{ Gravatar::src($user->email) }}" alt=""> </td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->name}}</td>
                        <td> 
                            @if(!$user->isAdmin())
                                <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                @csrf
                                <button type ="submit" class="btn btn-success btn-sm">Make Admin</button>
                                </form>
                            @endif
                        </td>
                </tr>
                @endforeach
                </tbody>
                </table>
        @else
                <h4 class="text-center">No User Yet</h4>
        @endif
        </div>
</div>
@endsection