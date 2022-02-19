<nav class="navbar navbar-default bootsnav navbar-fixed">
    {{-- <div class="navbar-top bg-grey fix">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="navbar-callus text-left sm-text-center">
                        <ul class="list-inline">
                            <li><a href=""><i class="fa fa-phone"></i> Call us: 1234 5678 90</a></li>
                            <li><a href=""><i class="fa fa-envelope-o"></i> Contact us: your@email.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="navbar-socail text-right sm-text-center">
                        <ul class="list-inline">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-behance"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->


    <div class="container"> 
        <div class="attr-nav">
            <ul>
                <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
            </ul>
        </div> 

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{asset('images/VINDATA_RECORD.png')}}" class="logo" alt="" style="width: 100px;">
                <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
            </a>

        </div>
        <!-- End Header Navigation -->

        <!-- navbar menu -->
        @if (url()->current() == URL::to('/')."/check")
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Home</a></li>                    
                {{-- <li><a href="#features">About</a></li>
                <li><a href="#business">Service</a></li>
                <li><a href="#work">Portfolio</a></li>
                <li><a href="#test">Blog</a></li>
                <li><a href="#contact">Contact</a></li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
        @else
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">Home</a></li>                    
                <li><a href="#features">About</a></li>
                <li><a href="#testimonial">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        @endif
        
    </div> 

</nav>