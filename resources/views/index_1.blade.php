@php
    // print_r($users);exit;
@endphp
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

<style>
  .pagination{
      float: right;
      margin-top: 10px;
  }

  .w-5{
    /* display: none;   */
    width:30;
    margin-bottom: -10px;
  }
</style>

<div class="container">
<h2 style="text-align: center;">View Registration Records</h2>
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif
{{-- @if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif --}}
<table class="table center" style="width:100%;">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Image</th>
    <th>Action</th>
  </tr>
  <tbody>
        
        @foreach ($users as $user)
        @php
            // print_r($user->file); exit;
            
        @endphp
        <tr>

            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->subject }}</td>
            <td>{{ $user->message }}</td>
            {{-- <td><img src="{{ URL::asset('public/image'.$user->file) }}" width="100px"></td> --}}
            {{-- <td><img src="{{ URL::asset('public/image/'.$user->file) }}" width="100px"></td> --}}
            <td><img src="{{ asset($user->file) }}" width="100px"></td>
            {{-- <td><img src="E:/Laravel/{{ $user->file }}" width="100px"></td> --}}
            {{-- <td>{{ $user->file  }}</td> --}}
        <td>
            <form action="#" method="POST">
                {{-- <a class="btn btn-info" href="#">Show</a> --}}
                <a class="btn btn-primary" href="{{route('products.edit')}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        </tr>
          @endforeach
    </tbody>
    
</table>
{{-- <ul class="pagination"> --}}
    {{-- <li class="page-item"> --}}
        {{ $users->links() }}
    {{-- </li> --}}
{{-- </ul> --}}
</div>

