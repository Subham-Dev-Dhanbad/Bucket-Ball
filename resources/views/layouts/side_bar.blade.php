<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('bucket.list') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Bucket</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ball.list') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Ball</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('balls.assgin.list') }}" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Assgin</span>
                    </a>
                </li>





            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
