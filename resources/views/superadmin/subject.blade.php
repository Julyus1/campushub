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

    <title>CampusHub - Subjects</title>


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
                        <h1 class="h3 mb-2 text-gray-800">Subject Registration</h1>
                        <div class="d-inline-block btn btn-sm btn-primary shadow-sm add-btn" data-toggle="modal" data-target="#addSubject"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add New Subject</div>
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
                            <h6 class="m-0 font-weight-bold text-primary">Subject Lists</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Table -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-gradient-dark text-light">
                                            <th>ID</th>
                                            <th>Date Created</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Instructor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($subject->created_at)->format('m/d/Y') }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>{{ $subject->description }}</td>
                                            <td>{{ $subject->faculty->last_name ?? 'none' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item delete_data" data-id="{{ $subject->id }}" data-toggle="modal" data-target="#attachSection">
                                                        <span class="fa fa-paperclip text-danger"></span> Attach Sections
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item edit_data"
                                                        data-id="{{ $subject->id }}"
                                                        data-title="{{ $subject->title }}"
                                                        data-description="{{ $subject->description }}"
                                                        data-toggle="modal"
                                                        data-target="#editSubject">
                                                        <span class="fa fa-edit text-primary"></span> Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item delete_data" data-id="{{ $subject->id }}" data-toggle="modal" data-target="#delSubject">
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

    <form method="POST" action='{{ url('superadmin/subject/register') }}'>
        @csrf
        <div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <label for="name" class="control-label">Subject</label>
                        <input type="text" name="name" id="subname" class="form-control form-control-border" placeholder="Enter Subject Name" value="" required>
                    </div>
                    <div class="modal-body">
                        <label for="faculty" class="control-label">Assign Teacher</label>
                        <select name="faculty_id" id="faculty" class="form-control form-control-border">
                            <option value="">None</option>
                            @foreach ($faculties as $faculty)

                            <option value="{{ $faculty->id }}">{{ $faculty->last_name . " " . $faculty->first_name . " " . $faculty->middle_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body">
                        <label for="deptdescription" class="control-label">Description</label>
                        <textarea rows="3" name="description" id="deptdescription" class="form-control form-control-sm rounded-0" required></textarea>
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

    <!-- Modal -->
    <div class="modal fade" id="attachSection" tabindex="-1" role="dialog" aria-labelledby="attachSectionLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attachSectionLabel">Attach Sections to Subject</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="POST" action="{{ url('superadmin/subject/attach-sections') }}">
                    @csrf
                    <input type="hidden" name="subject_id" id="subject_id">

                    <div class="modal-body">
                        <label class="control-label">Select Sections</label>
                        <div id="section-list">
                            @foreach ($sections as $section)
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="sections[]"
                                    value="{{ $section->id }}"
                                    id="section_{{ $section->id }}"
                                    {{ $subject->sections->contains($section->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="section_{{ $section->id }}">
                                    {{ $section->title }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Attach</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Subject Details</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="edit_deptname" class="control-label">Subject</label>
                        <input type="text" name="name" id="edit_deptname" class="form-control form-control-border" placeholder="Enter Subject Name" required>

                        <label for="faculty" class="control-label">Assign Teacher</label>
                        <select name="faculty_id" id="faculty" class="form-control form-control-border">
                            <option value="">None</option>
                            @foreach ($faculties as $faculty)

                            <option value="{{ $faculty->id }}">{{ $faculty->last_name . " " . $faculty->first_name . " " . $faculty->middle_name }}</option>
                            @endforeach
                        </select>

                        <label for="edit_deptdescription" class="control-label">Description</label>
                        <textarea rows="3" name="description" id="edit_deptdescription" class="form-control form-control-sm rounded-0" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">Are you sure you want to delete this Subject permanently?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
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
                    var title = $(this).data('title');
                    var description = $(this).data('description');
                    var faculty = $(this).data('faculty');

                    // Open the modal
                    $('#editSubject').modal('show');

                    // Set form field values
                    $('#edit_deptname').val(title);
                    $('#edit_deptdescription').val(description);
                    $('#faculty').val(faculty);


                    // Dynamically set the form action URL
                    $('#editForm').attr('action', "{{ url('superadmin/subject/update') }}/" + id);
                });
            });


            $('.delete_data').on('click', function() {
                let subjectId = $(this).data('id');
                let actionUrl = "{{ url('superadmin/subject/delete') }}/" + subjectId;
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