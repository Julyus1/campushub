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
            <span class="text-dark">Manage Users</span></a>
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

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/admin/register') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Admin Registration</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/faculty/register') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Faculty Registration</span></a>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
            aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-list-alt"></i>
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
        Course Module
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/superadmin/department/register') }}">
            <i class="bi bi-building-fill"></i>
            <span class="text-dark">Department Registration</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/course/register') }}">
            <i class="bi bi-book-fill"></i>
            <span class="text-dark">Course Registration</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/section/list') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Section Registration</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/subject/list') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Subject Registration</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/grades') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Grading System</span></a>
    </li>

</ul>
<!-- End of Sidebar -->