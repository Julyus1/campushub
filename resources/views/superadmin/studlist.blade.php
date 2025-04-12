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

    <title>CampusHub - Student Lists</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')


    <style>

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-superadminsidebar></x-supersadminsidebar>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <x-superadmintopbar>
                    </x-superadmintopbar>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-2 text-gray-800">List of Students</h1>
                            <div class="d-inline-block btn btn-sm btn-primary shadow-sm add-btn" id="editBtn">
                                <i class="fas fa-plus fa-sm text-white-50"></i><a href="{{ url('superadmin/student/register') }}" style="text-decoration: none; color:  white;"> Add New Student</a>
                            </div>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Student Lists</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="bg-gradient-dark text-light">
                                                    <th>ID</th>
                                                    <th>Date Created</th>
                                                    <th>Current Section</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Action</th>
                                                    @forelse ($students as $student)
                                                <tr>

                                                    <td>{{ $student->id }}</td>


                                                    <td>{{ $student->created_at ? $student->created_at->format('Y/m/d') : 'N/A' }}</td>
                                                    <td>

                                                        {{ $student->latestAcadHistory?->section?->title ?? 'No Section History' }}
                                                    </td>

                                                    <td>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ url('superadmin/student/profile/' . $student->id) }}" class="btn btn-flat btn-default btn-sm border" title="View Student Profile">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>

                                                    </td>
                                                </tr>
                                                @empty
                                                {{-- Row to display if the $students collection is empty --}}
                                                <tr>
                                                    {{-- Make sure colspan matches the number of columns (5) --}}
                                                    <td colspan="5" class="text-center">No students found.</td>
                                                </tr>
                                                @endforelse
                                                </tbody>
                                        </table>
                                    </div>

                                    {{-- If using pagination, display links (ensure controller uses ->paginate()) --}}
                                    {{--
<div class="d-flex justify-content-center">
    {!! $students->links() !!}
</div>
--}}

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
    @vite('resources/js/jquery.dataTables.min.js')
    @vite('resources/js/dataTables.bootstrap4.min.js')
    @vite('resources/js/datatables-demo.js')

</body>

</html>