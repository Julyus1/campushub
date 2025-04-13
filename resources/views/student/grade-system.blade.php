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

    <title>CampusHub - Grade Display</title>


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
                <x-studenttopbar :student="$student" />
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">View Grades</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Academic History for: {{ $student->firstname }} {{ $student->lastname }}
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-gradient-dark text-light">
                                            {{-- Removed Academic Year column --}}
                                            <th>Year Lvl</th>
                                            <th>Semester</th>
                                            <th>Section</th>
                                            <th class="text-center">View Grades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($acadHistories as $history)
                                        <tr>
                                            <td>{{ $history->year ?? 'N/A' }}</td>
                                            {{-- Removed Academic Year cell --}}
                                            <td>{{ $history->semester ?? 'N/A' }}</td>
                                            <td>
                                                {{ $history->section->title ?? 'N/A' }}
                                            </td>
                                            <td class="text-center">
                                                {{-- CORRECTED LINK: Use the named route from previous steps --}}
                                                <a href="{{ route('student.grade.display', ['history' => $history->id]) }}" class="btn btn-flat btn-default btn-sm border">
                                                    <i class="fa fa-eye"></i> View Grades
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            {{-- Updated colspan to 4 (since one column was removed) --}}
                                            <td colspan="4" class="text-center">No academic history records found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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