<script type="text/javascript">
    try {
        ace.settings.loadState('main-container')
    } catch (e) {}
</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->
    <ul class="nav nav-list">
        <li class="active">
            <a href="{{ url('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- Sliders sidebar start -->
        <li class="">
            <a href="{{ route('home.slider') }}">
                <i class="menu-icon fa fa-sliders-h"></i>
                <span class="menu-text"> Sliders </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- Sliders sidebar start -->
        <!-- Quote sidebar start -->
        <li class="">
            <a href="{{ route('quote.index') }}">
                <i class="menu-icon fas fa-quote-right"></i>
                <span class="menu-text"> Quotes </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- Quote sidebar start -->
        <!-- Quote sidebar start -->
        <li class="">
            <a href="{{ route('testimonial.index') }}">
                <i class="menu-icon fas fa-address-book"></i>
                <span class="menu-text"> Testimonials </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- Quote sidebar start -->
        <!-- service sidebar start -->
        <li class="">
            <a href="{{ route('service.index') }}">
                <i class="menu-icon fab fa-servicestack"></i>

                <span class="menu-text"> Services </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- service sidebar start -->
        <!-- servicefeature sidebar start -->
        <li class="">
            <a href="{{ route('servicefeature.index') }}">
                <i class="menu-icon fab fa-servicestack"></i>

                <span class="menu-text"> Services Feature </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- servicefeature sidebar start -->

        <!-- about sidebar start -->
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon far fa-address-card"></i>
                <span class="menu-text"> Abouts </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="{{ route('about.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        About
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ route('aboutfeature.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Feature
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <!-- about sidebar start -->
        <!-- service sidebar start -->
        <li class="">
            <a href="{{ route('companyInfo.index') }}">
                <i class="menu-icon fab fa-servicestack"></i>

                <span class="menu-text"> Company Info </span>
            </a>

            <b class="arrow"></b>
        </li>
        <!-- service sidebar start -->
                <!-- service sidebar start -->
                <li class="">
                    <a href="{{ route('clientInfo.index') }}">
                        <i class="menu-icon fab fa-servicestack"></i>
        
                        <span class="menu-text"> Client Info </span>
                    </a>
        
                    <b class="arrow"></b>
                </li>
                <!-- service sidebar start -->
                <!-- portfolio sidebar start -->
                <li class="">
                    <a href="{{ route('company_portfolio.index') }}">
                        <i class="menu-icon fab fa-servicestack"></i>
        
                        <span class="menu-text">Company Portfolio</span>
                    </a>
        
                    <b class="arrow"></b>
                </li>
                <!-- portfolio sidebar end -->
                <!-- ourclient sidebar start -->
                <li class="">
                    <a href="{{ route('ourclient.index') }}">
                        <i class="menu-icon fab fa-servicestack"></i>
        
                        <span class="menu-text">Our Client</span>
                    </a>
        
                    <b class="arrow"></b>
                </li>
                <!-- ourclient sidebar end -->

    </ul><!-- /.nav-list -->


</div>
