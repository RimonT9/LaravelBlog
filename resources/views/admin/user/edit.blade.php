@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update of the user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">The control panel</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Users</a></li>
              <li class="breadcrumb-item active">Update of the user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf   
                @method('PATCH') 
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter user" name="name" value="{{ $user->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter user" name="email" value="{{ $user->email }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group w-50">
                <label>Update role</label>
                  <select name="role" class="form-control">
                  <option value=""></option>
                      @foreach ($roles as $id => $role)
                          <option value="{{ $id }}"
                              {{ $id == old('role') ? 'selected' : '' }}>
                              {{ $role }}</option>
                      @endforeach
                  </select>
                  @error('role')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
                  </div>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
                </div>
        </div>
          <!-- ./col -->
     </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
@endsection