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

    <title>CampusHub - Course Registration</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-superadminsidebar></x-superadminsidebar>
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
                        <h1 class="h3 mb-2 text-gray-800">Course Registration</h1>
                        <div class="d-inline-block btn btn-sm btn-primary shadow-sm add-btn" data-toggle="modal" data-target="#addCourse"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add New Course</div>
                    </div>
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Course Lists</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-gradient-dark text-light">
                                            <th>ID</th>
                                            <th>Date Created</th>
                                            <th>Department</th>
                                            <th>Course</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($courses as $course)
                                        <tr>
                                            <td>{{ $course->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($course->created_at)->format('m/d/Y') }}</td>
                                            <td data-deptid="{{ $course->department_id }}">
                                                {{$course->department->title ?? 'N/A' }}
                                            </td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item edit_data" data-toggle="modal" data-target="#editCourse" data-id="{{ $course->id }}">
                                                        <span class="fa fa-edit text-primary"></span> Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item delete_data" data-toggle="modal" data-target="#delCourse" data-id="{{ $course->id }}">
                                                        <span class="fa fa-trash text-danger"></span> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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


    <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('superadmin/course/add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="deptname" class="control-label">Department</label>
                        <select name="department_id" id="deptname" class="form-control form-control-sm form-control-border" required>
                            @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                        <label for="coursename" class="control-label">Course</label>
                        <input type="text" name="title" id="coursename" class="form-control form-control-border" placeholder="Enter Course Name" value="" required>
                        <label for="coursedescription" class="control-label">Description</label>
                        <textarea rows="3" name="description" id="coursedescription" class="form-control form-control-sm rounded-0" required></textarea>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Course Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="editForm" method="POST">


                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <label for="deptname" class="control-label">Department</label>
                        <select name="department_id" id="editdept" class="form-control form-control-sm form-control-border" required>
                            @foreach ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                        <label for="coursename" class="control-label">Course</label>
                        <input type="text" name="title" id="editcoursename" class="form-control form-control-border" placeholder="Enter Course Name" required>
                        <label for="description" class="control-label">Description</label>
                        <textarea rows="3" name="description" id="editdescription" class="form-control form-control-sm rounded-0" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this course permanently??
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/jquery-3.6.0.min.js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $(document).on("click", ".edit_data", function() {
                let courseId = $(this).data("id");
                let courseTitle = $(this).closest("tr").find("td:nth-child(4)").text();
                let courseDescription = $(this).closest("tr").find("td:nth-child(5)").text();
                let departmentId = $(this).closest("tr").find("td:nth-child(3)").data("deptid");
                console.log("Course ID:", courseId);

                $("#editForm").attr("action", "{{ url('superadmin/course/update') }}/" + courseId);
                $("#editcoursename").val(courseTitle);
                $("#editdescription").val(courseDescription);
                $("#editdept").val(departmentId);
            });

            $('.delete_data').on('click', function() {
                let courseId = $(this).data('id');
                let actionUrl = "{{ url('superadmin/course/delete') }}/" + courseId;
                $('#deleteForm').attr('action', actionUrl);
            });
        });
    </script>
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