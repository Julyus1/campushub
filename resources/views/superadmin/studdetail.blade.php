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
                                    <div class="table-responsive"> {{-- Added for better handling on small screens --}}
                                        <table class="table table-stripped table-bordered" id="academic-history">
                                            <thead>
                                                <tr class="bg-gradient-dark text-light">
                                                    <th class="py-1 text-center" style="width: 5%;">ID</th>
                                                    <th class="py-1 text-center" style="width: 30%;">Semester</th> {{-- Adjusted width --}}
                                                    <th class="py-1 text-center" style="width: 30%;">Year Level</th> {{-- Adjusted width --}}
                                                    <th class="py-1 text-center" style="width: 20%;">Section</th> {{-- Added Section Column Header --}}
                                                    <th class="py-1 text-center" style="width: 15%;">Action</th> {{-- Adjusted width --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{--
                    Loop through the academic histories associated with the student.
                    Assumes $student->acadHistories (and the related section for each history)
                    is available and loaded from the controller.
                    Using @forelse to handle the case where the collection might be empty.
                --}}
                                                @forelse ($student->acadHistories as $history)
                                                <tr>
                                                    {{-- History ID --}}
                                                    <td class="px-2 py-1 align-middle text-center">{{ $history->id }}</td>

                                                    {{-- History Semester --}}
                                                    <td class="px-2 py-1 align-middle">{{ $history->semester }}</td>

                                                    {{-- History Year Level --}}
                                                    <td class="px-2 py-1 align-middle">{{ $history->year }}</td>

                                                    {{-- History Section --}}
                                                    {{-- Add this new TD to display the section title --}}
                                                    {{-- Use null check: $history->section might be null if no section is assigned --}}
                                                    <td class="px-2 py-1 align-middle">{{ $history->section ? $history->section->title : 'N/A' }}</td>

                                                    {{-- Action Column with Dropdown --}}
                                                    <td class="px-2 py-1 align-middle text-center">
                                                        {{-- Action dropdown button --}}
                                                        <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        {{-- Dropdown menu --}}
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item edit_academic" href="#" data-id="{{ $history->id }}" data-url="{{-- route('academic.edit', $history->id) --}}">
                                                                <span class="fa fa-edit text-primary"></span> Edit
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item delete_academic" href="#" data-id="{{ $history->id }}" data-url="{{-- route('academic.destroy', $history->id) --}}">
                                                                <span class="fa fa-trash text-danger"></span> Delete
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                {{-- This content will be shown if $student->acadHistories is empty --}}
                                                <tr>
                                                    {{-- Update colspan to match the new number of columns (5) --}}
                                                    <td colspan="5" class="text-center py-3">
                                                        No academic history found for this student.
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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

    <div class="modal fade" id="addAcad" tabindex="-1" role="dialog" aria-labelledby="addAcadLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAcadLabel">
                        Add Academic Record for {{ $student->lastname }}, {{ $student->firstname }}
                        @if (!empty($student->middlename))
                        {{ Str::substr($student->middlename, 0, 1) }}.
                        @endif
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {{--
                Set the action to the route that will process the form.
                We'll name this route 'students.acadhistories.store'.
                Pass the student's ID to the route.
            --}}
                <form action="{{ route('students.acadhistories.store', $student->id) }}" method="POST">
                    {{-- Add CSRF Token for security --}}
                    @csrf

                    {{-- Add a hidden field to explicitly send the student_id --}}
                    {{-- Although we have it in the route, having it in the request body is also common --}}
                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="semester" class="control-label">Semester</label>
                                {{-- Ensure values match what you expect in the backend --}}
                                <select name="semester" id="semester" class="form-control form-control-sm form-control-border rounded-0" required>
                                    <option value="1st Semester">1st Semester</option> {{-- Use more specific value if needed --}}
                                    <option value="2nd Semester">2nd Semester</option> {{-- Use more specific value if needed --}}
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="year" class="control-label">Year Level</label>
                                {{-- Ensure values match what you expect in the backend --}}
                                <select name="year" id="year" class="form-control form-control-sm form-control-border rounded-0" required>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                    <option value="Others">Others</option> {{-- Added based on previous examples --}}
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            {{-- IMPORTANT: Course and Section Dropdowns --}}
                            {{-- These should ideally be populated dynamically. --}}
                            {{-- The 'section' dropdown MUST submit the 'section_id' (value attribute). --}}
                            {{-- You'll need to pass $courses and $sections data from the controller --}}
                            {{-- that displays this page/modal. --}}

                            <div class="col-md-6 form-group">
                                <label for="course" class="control-label">Course</label>
                                {{-- The name should likely be 'course_id' if your Course model uses 'id' as the primary key --}}
                                <select name="course_id" id="course" class="form-control form-control-sm form-control-border rounded-0" required>
                                    {{-- Default empty option --}}
                                    <option value="" disabled selected>-- Select Course --</option>

                                    {{-- *** Loop through the $courses passed from the controller *** --}}
                                    @if(isset($courses) && $courses->count() > 0) {{-- Check if $courses exists and is not empty --}}
                                    @foreach($courses as $course)
                                    {{--
                    Set the value to the course's ID.
                    Display the course's name (or title, or code - adjust $course->name accordingly).
                --}}
                                    <option value="{{ $course->id }}">{{ $course->title }}</option> {{-- Adjust 'name' if your attribute is different --}}
                                    @endforeach
                                    @else
                                    <option value="" disabled>No courses available</option> {{-- Optional: Message if no courses found --}}
                                    @endif
                                    {{-- Remove the static/placeholder option --}}
                                    {{-- <option value="1">TEMP: BSCS Course</option> --}}
                                </select>
                                {{-- Note: You will still likely need JS to update the Sections dropdown based on this selection --}}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="section" class="control-label">Section: </label>
                                <select name="section_id" id="section_id" class="form-control form-control-sm rounded-0" required>
                                    <option value="">Select Section</option>
                                    @foreach($sections as $section)
                                    <option value="{{ $section->id }}" data-course="{{ $section->course_id }}">
                                        {{ $section->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const courseSelect = document.getElementById('course');
            const sectionSelect = document.getElementById('section_id');
            const allSectionOptions = Array.from(sectionSelect.options).slice(1); // skip "Select Section"

            courseSelect.addEventListener('change', function() {
                const selectedCourseId = this.value;

                // Clear and reset section dropdown
                sectionSelect.innerHTML = '<option value="">Select Section</option>';

                const filtered = allSectionOptions.filter(option => option.dataset.course === selectedCourseId);
                filtered.forEach(option => sectionSelect.appendChild(option));
            });
        });
    </script>
    {{-- Add this somewhere in your main layout or student detail view to display flash messages --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- Display validation errors if needed --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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