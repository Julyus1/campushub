<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/ch-logo.png') }}" type="image/png" />
    @vite('public/icons/font/bootstrap-icons.css')
    @vite('resources/css/bootstrap.min.css')
    <!-- Custom fonts for this template-->
    @vite('public/vendor/fontawesome-free/css/all.min.css')

    <title>CampusHub - Student Profile</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-studentsidebar></x-studentsidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-studenttopbar :student="$student"/>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Welcome {{ $student->firstname . " " . $student->lastname }}</h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between py-4">
                            <!-- Left Section: Profile Image and Title -->
                            <div class="d-flex align-items-center">
                                <img class="img-profile rounded-circle img-fluid me-3" src="../img/undraw_profile.svg" alt="Profile Image" style="max-width: 100px;">
                                <h6 class="m-3 font-weight-bold text-primary">Student Profile</h6>
                            </div>

                            <!-- Right Section: Button
    <div class="card-tools">
        <button class="btn btn-sm btn-success bg-success btn-flat" type="button" id="print">
            <i class="fa fa-print"></i> Print
        </button>
    </div>  -->
                        </div>

                        <div class="card-body">
                            <div class="container-fluid" id="outprint">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label text-muted">Student ID</label>
                                            <div class="pl-4">{{ $student->id }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label text-muted">Status</label>
                                            <div class="pl-4">
                                                <span class="rounded-pill badge badge-primary bg-gradient-primary px-3">Active</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <fieldset class="border-bottom">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-muted">Name</label>
                                                <div class="pl-4">{{ $student->firstname . " " . $student->middlename . " " . $student->lastname }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted">Gender</label>
                                                <div class="pl-4">{{ $student->gender }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted">Date of Birth</label>
                                                <div class="pl-4">{{ $student->birthdate }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted">Contact #</label>
                                                <div class="pl-4">{{ $student->mobilenumber }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-muted">Complete Address</label>
                                                <div class="pl-4">{{ $student->stname . " " . $student->brgy . " " . $student->city . " " . $student->province   }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <!--<fieldset>
                    <legend class="text-muted">Academic History</legend>
                    <table class="table table-stripped table-bordered" id="academic-history">
                        <thead>
                            <tr class="bg-gradient-dark text-light">
                                <th class="py-1 text-center">ID</th>
                                <th class="py-1 text-center">Department/Course</th>
                                <th class="py-1 text-center">Semester/School Yr.</th>
                                <th class="py-1 text-center">Year</th>
                                <th class="py-1 text-center">Beg. of Sem. Status</th>
                                <th class="py-1 text-center">End of Sem. Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-2 py-1 align-middle text-center">1</td>
                                <td class="px-2 py-1 align-middle">
                                    <small><span class="">CCIS</span></small><br>
                                    <small><span class="">BSIT-MOBDEV</span></small>
                                </td>
                                <td class="px-2 py-1 align-middle">
                                    <small><span class="">First Semester</span></small><br>
                                    <small><span class="">2022-2023</span></small>
                                </td>
                                <td class="px-2 py-1 align-middle">1st Year</td>
                                <td class="px-2 py-1 align-middle text-center">
                                    <span class="rounded-pill badge badge-success px-3">Regular</span>
                                </td>
                                <td class="px-2 py-1 align-middle text-center">
                                    <span class="rounded-pill badge badge-success px-3">Completed</span>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </fieldset> -->
                            </div>
                        </div>
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
    <x-logoutmodal></x-logoutmodal>

    @vite('resources/js/jquery.min.js')
    @vite('resources/js/bootstrap.bundle.min.js')
    @vite('resources/js/jquery.easing.min.js')
    @vite('resources/js/sb-admin-2.min.js')


</body>

</html>