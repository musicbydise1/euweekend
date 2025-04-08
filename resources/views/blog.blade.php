@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>Blog</h1>
            <p>
                Is it difficult to learn English? How to get higher
                education in the Czech Republic? What is nostrification,
                why is it needed and how to do it? You will find the
                answer to all these questions in our blog about
                education in the Czech Republic.
            </p>
        </div>
    </section>

    <section class="featured-blog-section">
        <div class="container featured-blog-inner">
            <!-- Карточка 1 -->
            <div class="featured-blog-card">
                <div class="featured-blog-image">
                    <img src="{{ asset('images/blog1.jpg') }}" alt="Blog 1">
                </div>
                <div class="featured-blog-content">
                    <h3>CARES Act - Everything Small Business Owners Need to Know</h3>
                    <div class="blog-meta">
                        <span class="blog-author">Michelle Cook, CPA</span>
                        <span class="blog-date">Apr 2020</span>
                    </div>
                    <p class="blog-excerpt">
                        The Coronavirus Aid, Relief, and Economic Security (CARES) Act allocated
                        $350 billion to help small businesses keep workers employed amid
                        the pandemic and economic downturn. No doubt if you are a
                        small business owner who has employees directly affected by...
                    </p>
                    <a href="{{ route('blog.show', $article->slug) }}" class="blog-read-more">Read More</a>
                </div>
            </div>

            <!-- Карточка 2 -->
            <div class="featured-blog-card">
                <div class="featured-blog-image">
                    <img src="{{ asset('images/blog2.jpg') }}" alt="Blog 2">
                </div>
                <div class="featured-blog-content">
                    <h3>Top 10 Tax Deductions for Salon Owners</h3>
                    <div class="blog-meta">
                        <span class="blog-author">Michelle Cook, CPA</span>
                        <span class="blog-date">Apr 2020</span>
                    </div>
                    <p class="blog-excerpt">
                        We had the pleasure of being interviewed by Cory and Tony Stuart
                        of @salonreality for a Q&A on what to watch out for if you
                        are a salon owner. If you are reading this, maybe you are
                        interested in “Top 10 Deductions for Salon Owners.” So if you...
                    </p>
                    <a href="#" class="blog-read-more">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-list-section">
        <div class="container blog-list-inner">
            <!-- Сетка из 3 карточек -->
            <div class="blog-list-grid">
                <!-- Карточка 1 -->
                <div class="blog-card">
                    <img src="{{ asset('images/blog1.jpg') }}" alt="Blog 1" class="blog-card-img">
                    <h3>3 Reasons Why Claiming Your Tips Will Help You</h3>
                    <p class="blog-excerpt">
                        You just finished your client’s balayage and the feedback was incredible.
                        But what if you never claimed your tips?
                    </p>
                    <div class="blog-meta">
                        <span class="blog-date">Feb 2020</span>
                        <span class="blog-author">Michelle Cook, CPA</span>
                    </div>
                </div>

                <!-- Карточка 2 -->
                <div class="blog-card">
                    <img src="{{ asset('images/blog2.jpg') }}" alt="Blog 2" class="blog-card-img">
                    <h3>CARES Act - Everything Small Business Owners Need to Know</h3>
                    <p class="blog-excerpt">
                        The Coronavirus Aid, Relief, and Economic Security (CARES) Act allocated
                        $350 billion to help small businesses keep workers employed...
                    </p>
                    <div class="blog-meta">
                        <span class="blog-date">Feb 2020</span>
                        <span class="blog-author">Michelle Cook, CPA</span>
                    </div>
                </div>

                <!-- Карточка 3 (Read More на изображении) -->
                <div class="blog-card">
                    <div class="blog-img-wrapper">
                        <img src="{{ asset('images/blog3.jpg') }}" alt="Blog 3" class="blog-card-img">
                        <a href="#" class="read-more-btn">Read More</a>
                    </div>
                    <h3>Top 10 Tax Deductions for Salon Owners</h3>
                    <p class="blog-excerpt">
                        We had the pleasure of being interviewed by Cory and Tony Stuart of @salonreality
                        for a Q&A on what to watch out for if you are a salon owner...
                    </p>
                    <div class="blog-meta">
                        <span class="blog-date">Feb 2020</span>
                        <span class="blog-author">Michelle Cook, CPA</span>
                    </div>
                </div>
            </div>

            <!-- Кнопка Show More -->
            <div class="blog-list-show-more">
                <button class="btn-show-more">Show More</button>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container cta-inner">
            <div class="cta-text">
                <h2>При оплате занятий сразу <br>вы получите бонусы!</h2>
                <p>Свяжитесь с нами, и мы с радостью подберём
                    для вас подходящий курс!</p>
            </div>
            <div class="cta-buttons">
                <a href="#" class="cta-btn cta-btn-black">Send an Application</a>
                <a href="#" class="cta-btn cta-btn-outline">Request a Call</a>
            </div>
        </div>
    </section>
@endsection
