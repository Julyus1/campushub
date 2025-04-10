<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/student/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/ch-logo.png') }}" style="height: 40px; width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">CampusHub</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/faculty/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="text-dark">Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider dark">

    <!-- Heading -->
    <div class="sidebar-heading text-dark">
        Student Information
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGrade"
            aria-expanded="true" aria-controls="collapseGrade">
            <i class="fas fa-fw fa-list-alt"></i>
            <span class="text-dark">Upload Grades</span></a>
        <div id="collapseGrade" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">SUBJECTS & SECTIONS</h6>
                @foreach ($subjects as $subject)
                @foreach ($subject->sections as $section)
                <a class="collapse-item"
                    href="{{ url('faculty/grades/'.$section->id) }}">
                    {{ $subject->name }} – {{ $section->title }}
                </a>
                @endforeach
                @endforeach
            </div>
        </div>
    </li>
</ul>