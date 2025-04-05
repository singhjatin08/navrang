@extends('main.include.layout')
@section('content')
    <div>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section"
            style="
                    background-image: url({{ url('public/assets/images/blog-page-header.jpg') }});
                ">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper breadcrumb-white text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Blogs
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Blogs</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Blog Start -->
        <div class="blog-section-02 section-padding">
            <div class="container-fluid">

                <!-- Blog Items Start -->
                <div class="blog-items">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-4 col-md-6 mb-3">
                                <!-- Blog Item Start -->
                                <div class="blog-item-2">
                                    <div class="blog-item-2__image">
                                        <a href="{{ route('blog.detail', $blog->slug) }}">
                                            <img src="{{ url($blog->feature_image) }}" alt="Blog" width="1012"
                                                height="557" />
                                        </a>
                                    </div>
                                    <div class="blog-item-2__content">
                                        <ul class="blog-item-2__content--meta">
                                            <li>
                                                <span>
                                                    {{ $blog->created_at ? date('d-M-Y', strtotime($blog->created_at)) : 'N/A' }}
                                                </span>
                                            </li>
                                            <li>
                                                <span>By
                                                    <a href="#">{{ $blog->author }}</a>
                                                </span>
                                            </li>
                                        </ul>
                                        <h4 class="blog-item-2__content--title">
                                            <a href="{{ route('blog.detail', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h4>
                                        <p class="blog-item-2__content--description">
                                            {{ $blog->short_description }}
                                        </p>
                                        <a class="blog-item-2__content--btn btn"
                                            href="{{ route('blog.detail', $blog->slug) }}">
                                            Read more
                                        </a>
                                    </div>
                                </div>
                                <!-- Blog Item End -->
                            </div>
                        @endforeach
                    </div>

                </div>
                <!-- Blog Items End -->

                <!-- Pagination -->
                @if ($blogs->hasPages())
                    <div class="paginations">
                        <ul class="paginations-list-2">
                            <!-- Previous Page -->
                            <li>
                                <a href="{{ $blogs->previousPageUrl() }}"
                                    class="{{ $blogs->onFirstPage() ? 'disabled' : '' }}">
                                    <i class="lastudioicon-arrow-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            @foreach ($blogs->links()->elements[0] as $page => $url)
                                <li>
                                    <a href="{{ $url }}"
                                        class="{{ $page == $blogs->currentPage() ? 'active' : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            <!-- Next Page -->
                            <li>
                                <a href="{{ $blogs->nextPageUrl() }}"
                                    class="{{ $blogs->hasMorePages() ? '' : 'disabled' }}">
                                    <i class="lastudioicon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <!-- Blog End -->

        <!-- Newsletter Start -->
        <!-- Newsletter Start -->
        <div class="newsletter-section">
            <div class="newsletter-left"
                style="background-image: url({{ url('public/assets/images/newsletter-bg-1.jpg') }})">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">Follow us on</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>

                    <div class="newsletter-social">
                        <ul class="newsletter-social__list">
                            <li>
                                <a href="#" aria-label="facebook">
                                    <i class="lastudioicon-b-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="twitter">
                                    <i class="lastudioicon-b-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="instagram">
                                    <i class="lastudioicon-b-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="vimeo">
                                    <i class="lastudioicon-b-vimeo"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="envato">
                                    <i class="lastudioicon-envato"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
            <div class="newsletter-right"
                style="background-image: url({{ url('public/assets/images/newsletter-bg-2.jpg') }})">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>
                    <form action="#">
                        <div class="newsletter-form-style-1">
                            <input type="text" placeholder="Enter your email address..." />
                            <button>Subscribe</button>
                        </div>
                    </form>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
        </div>
        <!-- Newsletter End -->

        <!-- Newsletter End -->
    </div>
@endsection
