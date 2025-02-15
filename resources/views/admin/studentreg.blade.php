<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/ch-logo.png" type="image/gif" />
    <link rel="stylesheet" href="../icons/font/bootstrap-icons.css">
    @vite('resources/css/bootstrap.min.css')
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title>CampusHub - Student Registration</title>


    @vite('resources/css/sb-admin-2.min.css')

    <!-- Custom Styles -->
    <style>
        .section-title,
        .section-title:hover {
            text-decoration: none;
            color: gold;
        }

        .img-thumb-path {
            width: 100px;
            height: 80px;
            object-fit: scale-down;
            object-position: center center;
        }

        label {
            font-weight: bold;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../img/ch-logo.png" style="height: 40px; width: 40px;">
                </div>
                <div class="sidebar-brand-text mx-3">CampusHub</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent"
                    aria-expanded="true" aria-controls="collapseStudent">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Manage Students</span></a>
                <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Students Module:</h6>
                        <a class="collapse-item" href="student-list">Student Lists</a>
                        <a class="collapse-item" href="register-student">Student Registration</a>
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
                <a class="nav-link" href="register-department">
                    <i class="bi bi-building-fill"></i>
                    <span>Department Lists</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="register-course">
                    <i class="bi bi-book-fill"></i>
                    <span>Course Registration</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="btn btn-link rounded-circle border-0" id="sidebarToggleTop"><i class="fa fa-bars"></i></button>
                        <span class="ms-2"><strong>SYSTEMS PLUS COLLEGE FOUNDATION</strong></span>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Karl Barroa</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Student Information Management</h1>
                    </div>

                    <!-- Student Information Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Registration</h6>
                        </div>
                        <form method="POST" action="student">
                            @csrf
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="" id="student_form">
                                        <input type="hidden" name="id">
                                        <fieldset class="border-bottom">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="studid" class="control-label">Student ID: </label>
                                                    <input type="text" name="stud_id" id="studid" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="yearlevel" class="control-label">Year Level: </label>
                                                    <select name="year_level" id="yearlevel" class="form-control form-control-sm rounded-0" required>
                                                        <option>Others</option>
                                                        <option>3rd Year</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="studclass" class="control-label">Student Class: </label>
                                                    <select name="studclass" id="studclass" class="form-control form-control-sm rounded-0" required>
                                                        <option>Old Student</option>
                                                        <option>New Student</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="department" class="control-label">Department: </label>
                                                    <select name="department" id="department" class="form-control form-control-sm rounded-0" required>
                                                        <option>CCIS</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="course" class="control-label">Course: </label>
                                                    <select name="course" id="course" class="form-control form-control-sm rounded-0" required>
                                                        <option>BSCS</option>
                                                        <option>BSIT-NETAD</option>
                                                        <option>BSIT-MOBDEV</option>
                                                        <option>BSEMC-AM</option>
                                                        <option>BSEMC-GM</option>
                                                        <option>BSIS</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="section" class="control-label">Section: </label>
                                                    <select name="section_id" id="section_id" class="form-control form-control-sm rounded-0" required>
                                                        <option value="">Select Section</option>
                                                        @foreach($sections as $section)
                                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                                        @endforeach
                                                    </select>>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="firstname" class="control-label">First Name: </label>
                                                    <input type="text" name="firstname" id="firstname" class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="middlename" class="control-label">Middle Name: </label>
                                                    <input type="text" name="middlename" id="middlename" class="form-control form-control-sm rounded-0" placeholder="optional">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="lastname" class="control-label">Last Name: </label>
                                                    <input type="text" name="lastname" id="lastname" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="gender" class="control-label">Gender: </label>
                                                    <select name="gender" id="gender" class="form-control form-control-sm rounded-0" required>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="dob" class="control-label">Date of Birth: </label>
                                                    <input type="date" name="dob" id="dob" class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="contact" class="control-label">Contact #</label>
                                                    <input type="text" name="contact" id="contact" class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="religion" class="control-label">Religion: </label>
                                                    <input type="text" name="religion" id="religion" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="origin" class="control-label">Province Origin: </label>
                                                    <input type="text" name="origin" id="origin" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nationality" class="control-label">Nationality: </label>
                                                    <select name="nationality" id="nationality" class="form-control form-control-sm rounded-0" required>
                                                        <option>Filipino</option>
                                                        <option>Foreign</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="civilstatus" class="control-label">Civil Status: </label>
                                                    <select name="civilstatus" id="civilstatus" class="form-control form-control-sm rounded-0" required>
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Widdowed</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="birthplace" class="control-label">Place of Birth: </label>
                                                    <input type="text" name="birthplace" id="birthplace" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="stname" class="control-label">Number & Street Name: </label>
                                                    <input type="text" name="stname" id="stname" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="brgy" class="control-label">Brgy, Bario, Village, Subdivision: </label>
                                                    <input type="text" name="brgy" id="brgy" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="city" class="control-label">Municipality, City: </label>
                                                    <input type="text" name="city" id="city" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="province" class="control-label">Province: </label>
                                                    <input type="text" name="province" id="province" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="postalcode" class="control-label">Postal Code: </label>
                                                    <input type="text" name="postalcode" id="postalcode" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="homenumber" class="control-label">Home Phone No.: </label>
                                                    <input type="text" name="homenumber" id="homenumber" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="mobilenumber" class="control-label">Mobile Phone No.: </label>
                                                    <input type="text" name="mobilenumber" id="mobilenumber" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="emergencyperson" class="control-label">Emergency Contact Person: </label>
                                                    <input type="text" name="emergencyperson" id="emergencyperson" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="relationship" class="control-label">Relationship: </label>
                                                    <select name="relationship" id="relationship" class="form-control form-control-sm rounded-0" required>
                                                        <option>Father</option>
                                                        <option>Mother</option>
                                                        <option>Guardian</option>
                                                        <option>Partner</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="emergencycontact" class="control-label">Emergency Contact No.: </label>
                                                    <input type="text" name="emergencycontact" id="emergencycontact" autofocus class="form-control form-control-sm rounded-0" required>
                                                </div>
                                            </div>

                                </div>


                                </fieldset>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-flat btn-primary btn-sm" type="submit">Save Student Details</button>
                                <a href="./?page=students" class="btn btn-flat btn-default border btn-sm">Cancel</a>
                            </div>
                        </form>
                    </div>


                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Taurus Company 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
@vite('resources/js/jquery.min.js')
@vite('resources/js/bootstrap.bundle.min.js')
@vite('resources/js/jquery.easing.min.js')
@vite('resources/js/sb-admin-2.min.js')
@vite('resources/js/jquery.dataTables.min.js')
@vite('resources/js/dataTables.bootstrap4.min.js')
@vite('resources/js/datatables-demo.js')

</body>

</html>