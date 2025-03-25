<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/superadmin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('../img/ch-logo.png') }}" style="height: 40px; width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">CampusHub</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="text-dark">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        User Management
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-list-alt"></i>
            <span class="text-dark">Manage Users Accounts</span></a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Lists:</h6>
                <a class="collapse-item" href="{{ url('/superadmin/admin/user') }}">Admin</a>
                <a class="collapse-item" href="{{ url('/superadmin/faculty/user') }}">Faculty</a>
                <a class="collapse-item" href="{{ url('/superadmin/student/user') }}">Student</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        User Information Management
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser2"
            aria-expanded="true" aria-controls="collapseUser2">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Manage Users</span></a>
        <div id="collapseUser2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Registration</h6>
                <a class="collapse-item" href="{{ url('/superadmin/admin/register') }}">Admin Registration</a>
                <a class="collapse-item" href="{{ url('/superadmin/faculty/register') }}">Faculty Registration</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
            aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-user"></i>
            <span class="text-dark">Manage Students</span></a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Students Module:</h6>
                <a class="collapse-item" href="{{ url('/superadmin/student/list') }}">Student Lists</a>
                <a class="collapse-item" href="{{ url('/superadmin/student/register') }}">Student Registration</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Academic Unit Registration
    </div>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAcad"
            aria-expanded="true" aria-controls="collapseAcad">
            <i class="bi bi-building"></i>
            <span class="text-dark">Academic Units</span></a>
        <div id="collapseAcad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Academic Structures:</h6>
                <a class="collapse-item" href="{{ url('/superadmin/department/register') }}">Department Registration</a>
                <a class="collapse-item" href="{{ url('/superadmin/course/register') }}">Course Registration</a>
                <a class="collapse-item" href="{{ url('/superadmin/section/list') }}">Section Registration</a>
                <a class="collapse-item" href="{{ url('/superadmin/subject/list') }}">Subject Registration</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/subject/attach') }}">
            <i class="bi bi-book-fill"></i>
            <span class="text-dark">Subjects & Sections</span></a>
    </li>

</ul>
<!-- End of Sidebar -->