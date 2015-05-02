<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li{{ (Request::is('dashboard') ? ' class="active open"' : '') }}>
                <a href="{{route('dashboard')}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>


            <li {{ (Request::is('student*') ? ' class="active open"' : '') }}>
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Students</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('student.create')}}">
                            <i class="icon-badge"></i>
                            Enroll a Student</a>
                    </li>
                    <li>
                        <a href="{{route('student.index')}}">
                            <i class="icon-folder"></i>
                            Search a Student</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-settings"></i>
                            Student Graphs</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="icon-rocket"></i>
                    <span class="title">Classes</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('studioclass.create')}}">
                            <i class="icon-badge"></i>
                            Add New Class</a>
                    </li>
                    <li>
                        <a href="{{route('studioclass.index')}}">
                            <i class="icon-folder"></i>
                            Search a Class</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-settings"></i>
                            Class Graphs</a>
                    </li>

                </ul>
            </li>

            <li{{ (Request::is('campaign*') ? ' class="active open"' : '') }}>
                <a href="javascript:;">
                    <i class="icon-diamond"></i>
                    <span class="title">Marketing</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('campaign.create')}}">
                            <i class="icon-badge"></i>
                            Add New Campaign</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-folder"></i>
                            Search a Campaign</a>
                    </li>

                </ul>
            </li>

            <li{{ (Request::is('subscriber*') ? ' class="active open"' : '') }}>
                <a href="javascript:;">
                    <i class="icon-puzzle"></i>
                    <span class="title">Users</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('subscriber.create')}}">
                            <i class="icon-badge"></i>
                            Add New User</a>
                    </li>
                    <li>
                        <a href="{{route('subscriber.index')}}">
                            <i class="icon-folder"></i>
                            Search Users</a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-clock"></i>
                            Timesheet</a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-tag"></i>
                            Tasks</a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-calendar"></i>
                            Calendar</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="icon-paper-plane"></i>
                    <span class="title">Finances</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{route('revenue.create')}}">
                            <i class="icon-badge"></i>
                            Add Revenue</a>
                    </li>
                    <li>
                        <a href="{{route('revenue.index')}}">
                            <i class="icon-folder"></i>
                            Search Revenue</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">Advance Search</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            <i class="icon-anchor"></i>
                            Custom Search</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-folder"></i>
                            Select a Saved Search</a>
                    </li>

                </ul>
            </li>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>