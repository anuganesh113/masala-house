@extends('site.layouts.layout')
@section('page_title', data_get($blog, 'name'))


@push('header')
<style>
    .boxshadow {
        box-shadow: 0px 2px 7px rgb(22 30 106 / 30%) !important;
    }

    .plt-50 {
        padding: 30px 50px;
    }
    
    /* Responsive padding */
    @media (max-width: 768px) {
        .plt-50 {
            padding: 20px 25px;
        }
    }
    
    @media (max-width: 576px) {
        .plt-50 {
            padding: 15px 20px;
        }
    }

    .fxl {
        font-size: x-large !important;
    }
    
    /* Responsive font sizes */
    @media (max-width: 768px) {
        .fxl {
            font-size: large !important;
        }
    }

    .fxs {
        font-size: x-small !important;
    }

    .blog ul li,
    a {
        color: #000;
        font-size: 1rem !important;
    }

    .blog ul li,
    a:hover {
        color: #FF6F00;
        font-size: 1rem !important;
    }

    .mt-15 {
        margin-top: 15px !important;
    }
    
     @media (max-width: 950px) {
        .banner__page {
               min-height: 250px !important;
        }
        .banner__page--content{
            margin-top: 20px;
        }
        .mbabout{
                padding-top: 10rem;
        }
    }

    @media (max-width: 576px) {
        .mt-15 {
            margin-top: 12px !important;
        }
        .boxshadow.plt-50{
                margin-bottom: 35px;
        }
        
    }

    .mt-14 {
        margin-top: 14px !important;
    }

    .mt-10 {
        margin-top: 10px !important;
    }

    .mt-8 {
        margin-top: 8px !important;
    }
    
    .tx-grn {
        color: #62990a;
    }
    
    .tx-ngrn {
        color: #85542b;
    }
   
    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
  
    .green {
        font-weight: 800;
        color: #24be2c;
    }
    .orange {
        font-weight: 800;
        color: #FF6F00;
    }



       .banner__page {
        position: relative;
        /* overflow: hidden; */
        min-height: 425px;
    }
    
    .banner__page--img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
/*     
    .banner__page--img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    } */
    
    
</style>

@endpush

@section('content')
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ $blog->full_image_link }}" alt="{{ data_get($blog, 'alt', 'Blog banner') }}">
    </div>
    <div class="banner__page--content">
        <h1>Blog</h1>
        <p>{{ $blog->name }}</p>
    </div>
</section>

<section class="about mbabout">
    <div class="container">
        <div class="row">
            <!-- Main Content Column -->
            <div class="col-sm-8 col-lg-8">
                <div class="boxshadow plt-50">
                    <div class="about__img position-static mb-4 d-block">
                        <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::BLOGS_PATH, data_get($blog, 'image'))) }}"
                            alt="{{ data_get($blog, 'alt', data_get($blog, 'name')) }}"
                            loading="lazy" />
                    </div>
                    
                    <div class="blog-meta section__title">
                        <span>
                            <i class='far fa-user fxl'></i>
                            {{ $blog->author ?? 'Admin' }}
                        </span>
                        <span>
                            <i class='far fa-calendar-alt fxl'></i>
                            {{ $blog->created_at ? $blog->created_at->format('M d, Y') : date('M d, Y') }}
                        </span>
                    </div>
                    
                    <div class="section__title">
                        <h2 class="fxl">{{ data_get($blog, 'name') }}</h2>
                    </div>
                    
                    <div class="about__content blog-post-content">
                        {!! data_get($blog, 'description') !!}
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Column -->
            <div class="col-sm-4 col-lg-4">
                <!-- Recent Blogs Widget -->
                <div class="sidebar-widget section__title boxshadow plt-50 mb-rect">
                    <h2 class="fxl blog">Recent Blogs</h2>
                    <ul class="recent-blogs-list">
                        @if(isset($recentBlogs) && count($recentBlogs) > 0)
                            @foreach($recentBlogs as $recentBlog)
                                <li class="mt-15">
                                    <a href="{{ route('site.blog', $blog->slug) }}">
                                        {{ $recentBlog->name }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                           
                        @endif
                    </ul>
                </div>
                
                <!-- Featured Menu Items Widget -->
                <div class="sidebar-widget section__title boxshadow plt-50">
                    <h2 class="fxl blog">Check out our Indian Authentic Collection of Foods</h2>
                    <div class="menu-items-list">
                        @if(isset($categories) && count($categories) > 0)
                            @foreach($categories as $cat)
                                @foreach($cat->menus->take(5) as $menu)
                                    <div class="menu-item mt-15">
                                        <a href="{{requesturl()}}">{{ $menu->name }} - <em class="{{$menu->type== 'veg' ? 'green' : 'orange' }}">{{ checkVegetarian($menu->type)}}</em></a>
                                        <span class="{{$menu->type== 'veg' ? 'green' : 'orange' }}">${{ number_format($menu->price, 2) }}</span>
                                    </div>
                                @endforeach
                            @endforeach
                        @else
                           
                            <div class="menu-item mt-15">
                                <a href="#">None</a>
                                <span>$0.0</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Optional: Categories Widget -->
                <!-- @if(isset($categories) && count($categories) > 0)
                <div class="sidebar-widget section__title boxshadow plt-50">
                    <h2 class="fxl blog">Categories</h2>
                    <ul class="categories-list">
                        @foreach($categories as $category)
                            <li class="mt-15">
                                <a href="">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif -->
            </div>
        </div>
    </div>
</section>



@endsection
