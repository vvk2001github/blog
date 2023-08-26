@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ __('Categories') }}</h1>
        <section class="featured-posts-section">
            <div class="row mb-3 justify-content-center">
                <div class="widget widget-post-list w-50">
                    <ul class="list-group post-list">
                        @foreach ($categories as $category)

                            <li class="post list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('main.categories.show', $category) }}" class="post-permalink media">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $category->title }}</h6>
                                    </div>
                                </a>
                                <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row mb-5 mt-5">
                <div class="mx-auto" style="margin-top: -100px;">
                    {{ $categories->links() }}
                </div>
            </div>

        </section>
        <div class="row">

            {{-- <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">{{ __('Popular posts') }}</h5>
                    <ul class="post-list">
                        @foreach ($likedPosts as $likedPost)
                            <li class="post">
                                <a href="{{ route('post.show', $likedPost) }}" class="post-permalink media">
                                    <img src="{{ Storage::url($likedPost->preview_image) }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $likedPost->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>

</main>
@endsection
