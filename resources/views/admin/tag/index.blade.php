@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">The control panel</a></li>
              <li class="breadcrumb-item active">Tags</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
          <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary">Add</a>         
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
                    @foreach ($tags as $tag)
                    <tr>
                      <td>{{ $tag->id }}</td>
                      <td>{{ $tag->title }}</td>
                      <td><a href="{{ route('admin.tag.show', $tag->id )}}"><i class='far fa-eye'></i></a></td>
                      <td><a href="{{ route('admin.tag.edit', $tag->id )}}" class="text-success"><i class='fas fa-pencil-alt'></i></a></td>
                      <td>
                        <form action="{{ route('admin.tag.delete', $tag->id )}}" method="POST">
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
