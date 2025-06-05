@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>About - Navrangaroma Candles</title>
@endsection
@section('content')
    <div>
        <div class="banner-item-2 banner-bg-02 js-scroll ShortFadeInUp scrolled" style="
                    background-image: url('{{ url('public/assets/images/banner/banner-6.jpg') }}');
                ">
            <div class="banner-item-2__content text-center ms-auto">
                <h3 class="banner-item-2__sub-title">
                    Navrang Aroma Candle
                </h3>
                <h2 class="banner-item-2__title">About US</h2>
            </div>
        </div>
        <!-- About Start -->
        <div class="section-padding bg-light">
            <div class="container-fluid custom-container">
                <!-- About Title Start -->
                <div class="text-
                    js-scroll ShortFadeInUp">
                    {{-- <h2 class="about-title__title">About Us:- </h2> --}}
                    <p>
                        Navrang Aroma Candle, with 20 years of
                        expertise, is your go-to for exquisite scented
                        candles that brighten homes and lives. Our
                        candles are handcrafted with love and care and
                        offer soothing, blissful fragrances that strengthen
                        bonds and create lasting memories. From
                        Tealight to Designer Candles, natural waxes,
                        essential oils, and lead-free cotton wicks ensure
                        a rich, unique scent. Navrang Aroma Candle is
                        your one-stop shop for high-quality, exotic, and
                        soothing candles at an affordable price.

                    </p>


                    <h2 class="about-title__title py-3">Founder’s Story:- </h2>
                    <p>
                        Welcome to Navrang Aroma Candles, a heartfelt venture born from
                        passion, purpose, and a shared vision of healing. We are Tejika Anand and
                        Mamta Kashyap, two women with distinct yet complementary strengths,
                        united by a desire to bring light, comfort, and wellness into every home.
                        The idea for Navrang Aroma Candles was sparked after witnessing the
                        challenges people faced post-pandemic—stress, weakened immunity,
                        and difficulty focusing. We wanted to offer something meaningful that not
                        only brings warmth and fragrance into spaces but also fosters healing and
                        balance.

                    </p>
                    <p>
                        For Tejika, candle-making started as a school hobby and grew into a
                        lifelong passion. After mastering the art in 2009 and spending 18 years
                        honing her craft in various creative fields, she realized candles could do
                        more than light up homes they could heal, calm, and rejuvenate. Each
                        hand-poured candle reflects her dedication to blending ancient wisdom
                        with modern needs, using herbs, spices, crystals, and natural ingredients
                        to maximize benefits.
                    </p>
                    <p>

                        Mamta, a seasoned entrepreneur, brings a wealth of experience in
                        business management and jewelry design. For her, joining Navrang Aroma
                        Candles is about building a community. Having seen how deeply people
                        crave authenticity and connection, she strives to make this brand not just
                        a product line, but a source of comfort and trust in every household.
                        Together, we’ve created natural, lead-free candles that bring harmony to
                        your home because we believe light should heal as much as it warms.
                        Welcome to a journey of coziness, care, and renewal. Welcome to
                        Navrang Aroma Candles.
                    </p>

                </div>
                <!-- About Title End -->
            </div>
        </div>


    </div>
@endsection