<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/ch-logo.png') }}" style="height: 40px; width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">CampusHub</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="text-dark">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Faculty Information
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/faculty/list') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span class="text-dark">Faculty Registration</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Student Information
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
            aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-list-alt"></i>
            <span class="text-dark">Manage Students</span></a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Students Module:</h6>
                <a class="collapse-item" href="{{ url('student/list') }}">Student Lists</a>
                <a class="collapse-item" href="{{ url('student/register') }}">Student Registration</a>
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
                <a class="collapse-item" href="{{ url('course/register') }}">Course Registration</a>
                <a class="collapse-item" href="{{ url('section/list') }}">Section Registration</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Assign Schedule
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/class-scheduling') }}">
            <i class="fas fa-fw fa-calendar"></i>
            <span class="text-dark">Class Scheduling</span></a>
    </li>

</ul>