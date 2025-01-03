@extends('personal.layouts.main')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Comments</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Comments</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>№</th>
                    <th>Message</th>
                    <th>Post</th>
                    <th colspan='3'>Interactive:</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comment->message }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td><a href="{{ route('post.show', $comment->post_id )}}"><i class='far fa-eye'></i></a></td>
                    <td><a href="{{ route('personal.comment.edit', $comment->id )}}" class="text-success"><i class='fas fa-pencil-alt'></i></a></td>
                    <td>
                      <form action="{{ route('personal.comment.delete', $comment->id )}}" method="post">
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