@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2 mb-2">{{ $category->title }}</h1>
            <a href="{{ route('admin.category.edit', $category->id )}}" class="text-success"><i class='fas fa-pencil-alt'></i></a>
            <form action="{{ route('admin.category.delete', $category->id )}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="border-0 bg-transparent">
              <i class='fas fa-trash text-danger' role="button"></i>
              </button>
            </form>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">The control panel</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.category.index') }}">Categories</a></li>
              <li class="breadcrumb-item active">{{ $category->title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
          <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{ $category->title }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
      </div>
    </section>
  </div>
@endsection
