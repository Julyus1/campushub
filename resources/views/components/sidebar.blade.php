<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

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
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Student Information
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
            aria-expanded="true" aria-controls="collapseStudent">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Manage Students</span></a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Students Module:</h6>
                <a class="collapse-item" href="{{ url('student/list') }}">Student Lists</a>
                <a class="collapse-item" href="{{ url('student/register') }}">Student Registration</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Course Module
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('department/register') }}">
            <i class="bi bi-building-fill"></i>
            <span>Department Registration</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('course/register') }}">
            <i class="bi bi-book-fill"></i>
            <span>Course Registration</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('section/list') }}">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Section Registration</span></a>
    </li>

</ul>