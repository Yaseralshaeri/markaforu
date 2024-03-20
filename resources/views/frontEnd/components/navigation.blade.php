@yield('navigation')
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <div class="col-md-3 sidebar_logo">
                <div class="header-logo">
                    <a href="#" class="logo">
                        <img src="{{asset('frontEnd/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                @foreach ($sections as $section)
                    <li class=""><a href="#" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">{{ $section->section_name }}</a>
                        <ul role="menu" id="drop-down" class="dropdown-menu">
                            @foreach ($section->categories as $category)
                                <li class="nav-item"> <a href="/products/{{$section->id}}/{{$category->id}}" class="nav-link ">{{$category->category_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
