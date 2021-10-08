<div class="sidebar" data-color="blue" data-image="{{ asset('dashboard/img/sidebar-1.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
                IBU SDP
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{Nav::isRoute('home')}}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @role('administrator')
            <li class="nav-item {{Nav::isRoute('users.index')}}">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>User Management</p>
                </a>
            </li>
            <li class="nav-item {{Nav::isRoute('permissions.index')}}">
                <a class="nav-link" href="{{route('permissions.index')}}">
                    <i class="nc-icon nc-key-25"></i>
                    <p>Permissions</p>
                </a>
            </li>
            <li class="nav-item {{Nav::isRoute('roles.index')}}">
                <a class="nav-link" href="{{route('roles.index')}}">
                    <i class="nc-icon nc-settings-tool-66"></i>
                    <p>Roles</p>
                </a>
            </li>
            @endrole @role('professor')
            <li class="nav-item {{Nav::isRoute('topics.index')}}">
                <a class="nav-link" href="{{route('topics.index')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Topic Management</p>
                </a>
            </li>
            <li class="nav-item {{Nav::isRoute('tasks.create')}}"> 
                <a class="nav-link" href="{{route('tasks.create')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Assign Task</p>
                </a>
            </li>
            @endrole @role('student')
            <li class="nav-item {{Nav::isRoute('applyThesis.create')}}">
                <a class="nav-link" href="{{route('applyThesis.create')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Thesis Applications</p>
                </a>
            </li>
            @endrole
            @role('coordinator')
            <li class="nav-item {{Nav::isRoute('deadlines.create')}}">
                    <a class="nav-link" href="{{route('deadlines.create')}}">
                        <i class="nc-icon nc-notes"></i>
                        <p>Deadlines</p>
                    </a>
                </li>
            @endrole

            <li class="nav-item active active-pro">
                <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="nc-icon nc-button-power"></i>
                    <p>Sign Out</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>