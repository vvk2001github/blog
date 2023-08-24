@extends('admin.layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Editing a post') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                <div class="col-12">

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group w-25">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('Enter title') }}" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="summernote">{{ $post->content }}</textarea>
                        </div>

                        <div class="form-group w-50">
                            <label for="preview_image">{{ __('Add preview') }}</label>
                            <div class="w-25 mb-2">
                                <img src="{{ Storage::disk('public')->url($post->preview_image) }}" alt="{{ __('Preview image') }}" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="preview_image" name="preview_image">
                                    <label class="custom-file-label" for="preview_image">{{ __('Choose image') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('Upload') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group w-50 mb-2">
                            <label for="main_image">{{ __('Add main image') }}</label>
                            <div class="w-50 mb-3">
                                <img src="{{ Storage::disk('public')->url($post->main_image) }}" alt="{{ __('Main image') }}" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="main_image" name="main_image">
                                    <label class="custom-file-label" for="main_image">{{ __('Choose image') }}</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{ __('Upload') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group w-50">
                            <label>{{ __('Choose category') }}</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? ' selected ' : '' }}
                                        >{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Tags') }}</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="{{ __('Choose tags') }}" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected ' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{ __("Update") }}">
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
