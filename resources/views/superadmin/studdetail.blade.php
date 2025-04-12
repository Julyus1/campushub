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

    <title>CampusHub - Student Details</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-superadminsidebar>
        </x-superadminsidebar>
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
                        <h1 class="h3 mb-2 text-gray-800">Student Information Management</h1>
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

                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center py-4">
                            <h6 class="m-0 font-weight-bold text-primary">Student Details</h6>
                            <div class="card-tools d-flex gap-2">
                                <a class="btn btn-sm btn-primary btn-flat" href="{{ url('superadmin/student/update/' . $student->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-sm btn-danger btn-flat delete-btn" data-id="{{ $student->id }}" data-toggle="modal" data-target="#delStudent">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                                <button class="btn btn-sm btn-success btn-flat" type="button" data-toggle="modal" data-target="#addAcad"><i class="fa fa-plus"></i> Add Academic</button>
                                <!-- <button class="btn btn-sm btn-info bg-info btn-flat" type="button" data-toggle="modal" data-target="#updateStatus">Update Status</button>
                                <button class="btn btn-sm btn-success bg-success btn-flat" type="button" id="print"><i class="fa fa-print"></i> Print</button>-->
                                <a href="{{ url('/superadmin/student/list') }}" class="btn btn-default border btn-sm btn-flat"><i class="fa fa-angle-left"></i> Back to List</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid" id="outprint">
                                <label>
                                    <h3>Student Profile</h3>
                                </label>

                                <fieldset class="border-bottom">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Name</label>
                                                <br>
                                                {{ $student['lastname'] }}, {{ $student['firstname'] }}
                                                @if (!empty($student['middlename']))
                                                {{ Str::substr($student['middlename'], 0, 1) }}.
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Gender</label>
                                                <div class="pl-4">{{ $student->gender }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Date of Birth</label>
                                                <div class="pl-4">{{ \Carbon\Carbon::parse($student->birthdate)->format('F d, Y') }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Contact #</label>
                                                <div class="pl-4">{{ $student->contact }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Religion</label>
                                                <div class="pl-4">{{ $student->religion }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Province of Origin</label>
                                                <div class="pl-4">{{ $student->origin }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Nationality</label>
                                                <div class="pl-4">{{ $student->nationality }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Civil Status</label>
                                                <div class="pl-4">{{ $student->civilstatus }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Place of Birth</label>
                                                <div class="pl-4">{{ $student->birthplace }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Email</label>
                                                <div class="pl-4">{{ $student->email }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Complete Address</label>
                                                <div class="pl-4">
                                                    {{ $student->stname }}, Brgy. {{ $student->brgy }},
                                                    {{ $student->city }}, {{ $student->province }}, {{ $student->postalcode }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border-bottom">
                                    <label>
                                        <h3>Emergency Contact</h3>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Emergency Contact Person</label>
                                                <div class="pl-4">{{ $student->emergencyperson }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Relationship</label>
                                                <div class="pl-4">{{ $student->relationship  }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label text-muted font-weight-bold">Emergency Contact #</label>
                                                <div class="pl-4">{{ $student->emergencycontact }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <legend class="text-muted">Academic History</legend>
                                    <table class="table table-stripped table-bordered" id="academic-history">
                                        <thead>
                                            <tr class="bg-gradient-dark text-light">
                                                <th class="py-1 text-center">ID</th>
                                                {{-- <th class="py-1 text-center">Department/Course</th> --}}
                                                <th class="py-1 text-center">Semester</th>
                                                <th class="py-1 text-center">Year Level</th>
                                                {{-- <th class="py-1 text-center">Beg. of Sem. Status</th>
                                                <th class="py-1 text-center">End of Sem. Status</th> --}}
                                                <th class="py-1 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-2 py-1 align-middle text-center">1</td>
                                                {{-- <td class="px-2 py-1 align-middle">
                                                    <small><span class="">CCIS</span></small><br>
                                                    <small><span class="">BSIT-MOBDEV</span></small>
                                                </td> --}}
                                                {{-- <td class="px-2 py-1 align-middle">
                                                    <small><span class="">1st Semester</span></small><br>
                                                    <small><span class="">1st Year</span></small>
                                                </td> --}}
                                                {{-- <td class="px-2 py-1 align-middle">1st Year</td> --}}
                                                {{-- <td class="px-2 py-1 align-middle text-center">
                                                    <span class="rounded-pill badge badge-success px-3">Regular</span>
                                                </td>
                                                <td class="px-2 py-1 align-middle text-center">
                                                    <span class="rounded-pill badge badge-success px-3">Completed</span>
                                                </td> --}}
                                                <td class="px-2 py-1 align-middle text-center">1st Semester</td>
                                                <td class="px-2 py-1 align-middle text-center">1st Year</td>
                                                <td class="px-2 py-1 align-middle text-center">
                                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        Action
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item edit_academic" href="#"><span class="fa fa-edit text-primary"></span> Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item delete_academic" href="#"><span class="fa fa-trash text-danger"></span> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </fieldset>
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


    <div class="modal fade" id="delStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE') <!-- Override method to DELETE -->
                    <div class="modal-body">
                        Are you sure you want to delete this student permanently?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAcad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add Academic Record for {{ $student['lastname'] }}, {{ $student['firstname'] }}
                        @if (!empty($student['middlename']))
                        {{ Str::substr($student['middlename'], 0, 1) }}.
                        @endif</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="semester" class="control-label">Semester</label>
                                <select name="semester" id="semester" class="form-control form-control-sm  form-control-border rounded-0" required>
                                    <option>First Semester</option>
                                    <option>Second Semester</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="year" class="control-label">Year Level</label>
                                <select name="year" id="year" class="form-control form-control-sm  form-control-border rounded-0" required>
                                    <option>1st Year</option>
                                    <option>2nd Year</option>
                                    <option>3rd Year</option>
                                    <option>4th Year</option>
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="schoolyear" class="control-label">School Year</label>
                                <input type="text" id="schoolyear" name="schoolyear" value="" class="form-control form-control-border form-control-sm" required>
                            </div> --}}
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="course_id" class="control-label">Course</label>
                                <select name="course_id" id="course_id" class="form-control form-control-sm form-control-border rounded-0 select2" required>
                                    <option>BSCS-lagyan nalang ng php reference</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="year" class="control-label">Year Level</label>
                                <input type="text" id="year" name="year" value="" class="form-control form-control-border form-control-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="status" class="control-label">Beginning of Semester Status</label>
                                <select name="status" class="form-control form-control-sm form-control-border rounded-0" required>
                                    <option value="1">New</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Returnee</option>
                                    <option value="4">Transferee</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="end_status" class="control-label">End of Semester Status</label>
                                <select name="end_status" class="form-control form-control-sm form-control-border rounded-0" required>
                                    <option value="0">Pending</option>
                                    <option value="1">Completed</option>
                                    <option value="2">Dropout</option>
                                    <option value="3">Failed</option>
                                    <option value="4">Transferred Out</option>
                                    <option value="5">Graduated</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Status of 0122301119</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="post">
                    <label for="status" class="control-label">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm form-control-border" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all delete buttons
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let studentId = this.getAttribute('data-id'); // Get student ID
                    let deleteForm = document.getElementById('deleteForm');

                    // Set the correct action URL dynamically
                    deleteForm.setAttribute('action', `{{ url('superadmin/student/delete') }}/${studentId}`);
                });
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