@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">The control panel</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
          <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Add</a>         
          </div>
          <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th colspan='3'>Interactive:</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->email }}</td>
                      <td><a href="{{ route('admin.user.show', $user->id )}}"><i class='far fa-eye'></i></a></td>
                      <td><a href="{{ route('admin.user.edit', $user->id )}}" class="text-success"><i class='fas fa-pencil-alt'></i></a></td>
                      <td>
                        <form action="{{ route('admin.user.delete', $user->id )}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="border-0 bg-transparent">
                          <i class='fas fa-trash text-danger' role="button"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
      </div>
    </section>
  </div>
@endsection
