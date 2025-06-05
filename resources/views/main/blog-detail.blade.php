@extends('main.include.layout')
@section('meta')
    @php
        echo $blog->seo_tags;
    @endphp
@endsection
@section('content')
    <div style="margin-top: 145px;">
        <!-- Breadcrumbs Start -->
        <div class="single-breadcrumbs bg-cream">
            <div class="container-fluid custom-container">
                <ul class="single-breadcrumbs-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                    <li><a href="{{ route('blog.bycategory',$blog->category_slug) }}">{{ $blog->category_name }} </a></li>
                    <li>
                        <span>
                            {{ $blog->title }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Single Start -->
        <div class="blog-section-02 section-padding-1">
            <div class="container-fluid blog-single-container">
                <!-- Blog Single Start -->
                <div class="blog-single">
                    <ul class="blog-single__category justify-content-center">
                        <li><a href="#">{{ $blog->category_name }}</a></li>
                    </ul>
                    <h1 class="blog-single__title text-center">
                        {{ $blog->title }}
                    </h1>
                    <ul class="blog-single__meta justify-content-center">
                        <li><span>{{ $blog->created_at ? date('d-M-Y', strtotime($blog->created_at)) : 'N/A' }}</span></li>
                        <li><span>{{ $blog->author }}</span></li>
                    </ul>
                    <div class="blog-single__image">
                        <img src="{{ url($blog->feature_image) }}" alt="Blog" width="1170" height="539">
                    </div>
                    <div class="blog-single__content blog-single-wrapper">
                        {{-- <h2 class="blog-single__heading"></h2> --}}

                        <div class="blog-single_description">
                            <?= $blog->description ?>
                        </div>
                    </div>


                </div>
                <!-- Blog Single End -->
            </div>
        </div>
        <!-- Blog Single End -->

        <!-- Related Blog Start -->
        <div class="related-blog section-padding">
            <div class="container-fluid related-container">
                <!-- Related Title Start -->
                <div class="related-title text-center">
                    <h2 class="related-title__title">Related Post</h2>
                </div>
                <!-- Related Title End -->

                <div class="related-blog-row">
                    @foreach ($suggestedBlogs as $blog)
                        <div class="related-blog-col">
                            <!-- Related Blog Item End -->
                            <div class="related-blog-item">
                                <div class="related-blog-item__image">
                                    <a href="{{ route('blog.detail',$blog->slug) }}">
                                        <img src="{{ url($blog->feature_image) }}" alt="Blog" width="507"
                                            height="304">
                                    </a>
                                </div>
                                <div class="related-blog-item__content">
                                    <ul class="related-blog-item__category">
                                        <li><a href="#">{{ $blog->category_name }}</a></li>
                                    </ul>
                                    <h3 class="related-blog-item__title">
                                        <a href="{{ route('blog.detail',$blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h3>
                                    <ul class="related-blog-item__meta">
                                        <li><span>{{ $blog->created_at ? date('d-M-Y', strtotime($blog->created_at)) : 'N/A' }}</span></li>
                                        <li>
                                            <span>
                                                by
                                                <a href="#">{{ $blog->author }}</a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Related Blog Item End -->
                        </div>
                    @endforeach
                </div>

                <!-- View all Button Start -->
                <div class="text-center">
                    <a href="{{ route('blogs') }}" class="view-more-btn"> VIEW ALL BLOG </a>
                </div>
                <!-- View all Button End -->
            </div>
        </div>
        <!-- Related Blog End -->
    </div>
@endsection
