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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr class="bg-gradient-dark text-light">
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>A.Y. / Year Lvl</th> {{-- Combined Header --}}
                                            <th>Semester</th>
                                            <th class="text-center">Action</th>
                                            <th>Grade Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Loop through the Academic History records passed from the controller --}}
                                        @forelse($acadHistories as $history)
                                        {{-- Check if student relationship is loaded (it should be) --}}
                                        @if($history->student)
                                        <tr>
                                            {{-- Access student data via the history record --}}
                                            <td>{{ $history->student->id }}</td>
                                            <td>{{ $history->student->lastname }}, {{ $history->student->firstname }} {{ $history->student->middlename }}</td>

                                            {{-- Access Year and Semester FROM the history record --}}
                                            <td>{{ $history->year ?? 'N/A' }}</td>
                                            <td>{{ $history->semester ?? 'N/A' }}</td>
                                            @php
                                            $grade = $grades->get($history->id);
                                            @endphp
                                            {{-- Action Button --}}
                                            <td class="text-center">
                                                <button type="button"
                                                    class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item add-btn"
                                                        href="#"
                                                        data-toggle="modal"
                                                        data-target="#addGrade"
                                                        data-student-id="{{ $history->student->id }}"
                                                        data-student-name="{{ $history->student->lastname }}, {{ $history->student->firstname }}"
                                                        data-acad-history-id="{{ $history->id }}">
                                                        <span class="fas fa-plus fa-sm text-success"></span>
                                                        {{ $grade ? 'Re-upload Grades' : 'Upload Grades' }}
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item edit_data"
                                                        href="#"
                                                        data-toggle="modal"
                                                        data-target="#editGrade"
                                                        data-grade-id="{{ $grade->id ?? '' }}"
                                                        data-prelims="{{ $grade->prelims ?? '' }}"
                                                        data-midterm="{{ $grade->midterm ?? '' }}"
                                                        data-finals="{{ $grade->finals ?? '' }}"
                                                        data-student-id="{{ $history->student->id }}">
                                                        <span class="fa fa-edit text-primary"></span>
                                                        Edit Grades
                                                    </a>
                                                </div>
                                            </td>
                                            <td> @if($grade)
                                                <span class="badge badge-success mb-1">Graded</span>
                                                @else
                                                <span class="badge badge-warning mb-1">Not Graded</span>
                                                @endif

                                                <br>
                                            </td>

                                        </tr>
                                        @endif {{-- End @if($history->student) --}}
                                        @empty
                                        {{-- Row displayed if $acadHistories is empty --}}
                                        <tr>
                                            {{-- Update colspan to match number of columns (5) --}}
                                            <td colspan="5" class="text-center">No students found enrolled in this section for the specified academic year and semester.</td>
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
    <form method="POST" action="{{ route('faculty.grades.store') }}" id="addGradeForm">
        @csrf
        {{-- Hidden inputs to hold IDs - values set by JavaScript --}}
        <input type="hidden" name="acad_history_id" id="add_acad_history_id" value="">
        <input type="hidden" name="subject_id" id="add_subject_id" value="{{ $subject->id ?? '' }}"> {{-- Pass subject ID --}}
        <input type="hidden" name="faculty_id" id="add_faculty_id" value="{{ Auth::user()->faculty->id ?? '' }}"> {{-- Pass faculty ID --}}

        <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="addGradeLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Added span to show student name --}}
                        <h5 class="modal-title" id="addGradeLabel">Upload Grades for <span id="studentNameLabel" class="font-weight-bold">Student</span></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- Prelim --}}
                        <div class="form-group">
                            <label for="add_prelim" class="control-label">Prelim Grade</label>
                            {{-- Use type="number" and step for decimals --}}
                            <input type="number" step="0.01" name="prelim" id="add_prelim" class="form-control form-control-border" placeholder="Enter Prelim Grade">
                            {{-- Display validation errors --}}
                            @error('prelim') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                        {{-- Midterm --}}
                        <div class="form-group">
                            <label for="add_midterm" class="control-label">Midterm Grade</label>
                            <input type="number" step="0.01" name="midterm" id="add_midterm" class="form-control form-control-border" placeholder="Enter Midterm Grade">
                            @error('midterm') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                        {{-- Final --}}
                        <div class="form-group">
                            <label for="add_final" class="control-label">Finals Grade</label>
                            <input type="number" step="0.01" name="final" id="add_final" class="form-control form-control-border" placeholder="Enter Finals Grade">
                            @error('final') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>
                        {{-- Display general errors or specific ID errors --}}
                        @error('acad_history_id') <span class="text-danger text-sm d-block">{{ $message }}</span> @enderror
                        @error('subject_id') <span class="text-danger text-sm d-block">{{ $message }}</span> @enderror
                        @error('faculty_id') <span class="text-danger text-sm d-block">{{ $message }}</span> @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save Grades</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Logout Modal-->


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
                    var id = $(this).data('grade-id'); // ⬅️ Correct this
                    var prelim = $(this).data('prelims'); // ⬅️ Match the HTML
                    var midterm = $(this).data('midterm');
                    var final = $(this).data('finals');

                    // Open the modal
                    $('#editGrade').modal('show');

                    // Set form field values
                    $('#edit_prelim').val(prelim);
                    $('#edit_midterm').val(midterm);
                    $('#edit_final').val(final);

                    // Set form action URL for PATCH request
                    $('#editForm').attr('action', "{{ url('faculty/grades') }}/" + id);
                });
            });

            $(document).ready(function() {
                $('#addGrade').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);

                    // Pull data from the button
                    var acadHistoryId = button.data('acad-history-id');
                    var studentName = button.data('student-name');
                    $('#add_acad_history_id').val(acadHistoryId);

                    // Get a reference to the modal
                    var modal = $(this);

                    // Get already-filled values from hidden inputs

                    var subjectId = $('#add_subject_id').val();
                    var facultyId = $('#add_faculty_id').val();

                    // Final check before allowing the modal to show
                    if (!acadHistoryId || !subjectId || !facultyId) {
                        console.error("Add Grade Modal Error: Missing required data.", {
                            acadHistoryId,
                            subjectId,
                            facultyId
                        });
                        alert("Error: Cannot open grade form. Required context (History, Subject, or Faculty ID) is missing. Please refresh the page.");
                        return event.preventDefault();
                    }

                    // Populate the fields
                    modal.find('#add_acad_history_id').val(acadHistoryId);
                    modal.find('#add_prelim').val('');
                    modal.find('#add_midterm').val('');
                    modal.find('#add_final').val('');
                    modal.find('#studentNameLabel').text(studentName);

                    // Log for dev/debug
                    console.log('Opening modal with:', {
                        acadHistoryId,
                        subjectId,
                        facultyId
                    });
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