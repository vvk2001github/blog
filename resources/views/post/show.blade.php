@extends('layouts.main')

@section('content')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> • {{ $post->created_date }} • {{ __('Comments') }} {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ Storage::url($post->main_image) }}" alt="{{ $post->title }}" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">{{ __('Related Posts') }}</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)

                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ Storage::url($relatedPost->preview_image) }}" alt="{{ $relatedPost->title }}" class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost) }}"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                                </div>

                            @endforeach
                        </div>
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">{{ __('Leave a Reply') }}</h2>
                        <form action="/" method="post">
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="message" class="sr-only">{{ __('Comment') }}</label>
                                <textarea name="message" id="message" class="form-control" placeholder="{{ __('Comment') }}" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
