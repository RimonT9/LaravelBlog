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
        <div class="col-lg-3 col-6">
          <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST">
              @csrf   
              @method('PATCH') 
              <div class="form-group">
                 <textarea class='form-control' name='message' cols='30' rows='10'>{{ $comment->message }}</textarea>
                  @error('message')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <input type="submit" class="btn btn-primary" value="Update">
          </form>
              </div>
      </div>
   </div>
    </div>
  </section>
</div>
@endsection