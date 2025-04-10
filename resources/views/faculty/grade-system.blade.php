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

    <title>CampusHub - Grading System</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-facultytopbar>
                </x-facultytopbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Upload Grades</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary"> {{ $section->department_title . "-" . $section->course->title . "-". $section->title . "-" . $subject->name }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Table -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-gradient-dark text-light">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Year Lvl</th>
                                            <th>A.Y.</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->lastname }}, {{ $student->firstname }} {{ $student->middlename }}</td>
                                            <td>{{ $student->year_level }}</td>
                                            <td>{{ $section->academicHistory->year ?? '—' }}</td>
                                            <td>{{ $section->academicHistory->semester ?? '—' }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item add-btn"
                                                        data-toggle="modal"
                                                        data-target="#addGrade"
                                                        data-student-id="{{ $student->id }}"
                                                        data-student-name="{{ $student->lastname }}, {{ $student->firstname }}">
                                                        <span class="fas fa-plus fa-sm text-success"></span>
                                                        Upload Grades
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item edit_data"
                                                        data-toggle="modal"
                                                        data-target="#editGrade"
                                                        data-grade-id="" {{-- you can load existing grade ID here --}}
                                                        data-prelims="" {{-- existing prelims --}}
                                                        data-midterm="" {{-- existing midterm --}}
                                                        data-finals="" {{-- existing finals --}}
                                                        data-student-id="{{ $student->id }}">
                                                        <span class="fa fa-edit text-primary"></span>
                                                        Edit Grades
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

    <form method="POST" action=''>
        @csrf
        <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Grades</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <label for="prelim" class="control-label">Prelim Grade</label>
                        <input type="text" name="prelim" id="prelim" class="form-control form-control-border" placeholder="Enter Prelim Grade" value="" optional>
                    </div>
                    <div class="modal-body">
                        <label for="midterm" class="control-label">Midterm Grade</label>
                        <input type="text" name="midterm" id="midterm" class="form-control form-control-border" placeholder="Enter Midterm Grade" value="" optional>
                    </div>
                    <div class="modal-body">
                        <label for="final" class="control-label">Finals Grade</label>
                        <input type="text" name="final" id="final" class="form-control form-control-border" placeholder="Enter Finals Grade" value="" optional>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <x-logoutmodal></x-logoutmodal>



    <div class="modal fade" id="editGrade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Grades</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="edit_prelim" class="control-label">Prelim Grade</label>
                        <input type="text" name="prelim" id="edit_prelim" class="form-control form-control-border" placeholder="Enter Prelim Grade" optional>

                        <label for="edit_midterm" class="control-label">Midterm Grade</label>
                        <input type="text" name="midterm" id="edit_midterm" class="form-control form-control-border" placeholder="Enter Midterm Grade" optional>

                        <label for="edit_final" class="control-label">Finals Grade</label>
                        <input type="text" name="final" id="edit_final" class="form-control form-control-border" placeholder="Enter Finals Grade" optional>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @vite('resources/js/jquery-3.6.0.min.js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $(document).ready(function() {
                $('.edit_data').on('click', function() {
                    var id = $(this).data('id');
                    var prelim = $(this).data('prelim');
                    var midterm = $(this).data('midterm');
                    var final = $(this).data('final');

                    // Open the modal
                    $('#editGrade').modal('show');

                    // Set form field values
                    $('#edit_prelim').val(prelim);
                    $('#edit_midterm').val(midterm);
                    $('#edit_final').val(final);

                    // Dynamically set the form action URL
                    $('#editForm').attr('action', "{{ url('') }}/" + id);
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