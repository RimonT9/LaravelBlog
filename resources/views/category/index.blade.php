@extends('layouts.main')
@section('content')
    <main class="blog">
      <div class="container">
        <h1 class="m-0">Categories</h1>
        <section class="featured-posts-section">
          <ul>
            @foreach($categories as $category)
            <li><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>
            @endforeach
        </section>
        </div>
    </main>
@endsection
