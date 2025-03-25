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

    <title>CampusHub - Faculty Lists</title>


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
                            <h1 class="h3 mb-2 text-gray-800">Faculty Lists</h1>
                            <div class="d-inline-block btn btn-sm btn-primary shadow-sm add-btn" data-toggle="modal" data-target="#addFaculty"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Add New Faculty</div>
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
                                <h6 class="m-0 font-weight-bold text-primary">Faculty Lists</h6>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($faculties as $faculty)
                                            <tr>
                                                <td>{{ $faculty->id }}</td>
                                                <td>{{ \Carbon\Carbon::parse($faculty->created_at)->format('m/d/Y') }}</td>
                                                <td>{{ $faculty->last_name . " ". $faculty->first_name . " " . $faculty->middle_name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        Action
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item edit_data"
                                                            data-id="{{ $faculty->id }}"
                                                            data-title="{{ $faculty->first_name }}"
                                                            data-toggle="modal"
                                                            data-target="#editFaculty">
                                                            <span class="fa fa-edit text-primary"></span> Edit
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item delete_data" data-id="{{ $faculty->id }}" data-toggle="modal" data-target="#delFaculty">
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

    <form method="POST" action='{{ url('superadmin/faculty/register') }}'>
        @csrf
        <div class="modal fade" id="addFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Faculty</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <label for="adminlastname" class="control-label">Last Name</label>
                        <input type="text" name="last_name" id="lastname" class="form-control form-control-border" placeholder="Enter Faculty Last Name" required>
                    </div>
                    <div class="modal-body">
                        <label for="edit_firstname" class="control-label">First Name</label>
                        <input type="text" name="first_name" id="firstname" class="form-control form-control-border" placeholder="Enter Faculty First Name" required>
                    </div>
                    <div class="modal-body">
                        <label for="edit_middleinitial" class="control-label">Middle Initial</label>
                        <input type="text" name="middle_name" id="middleinitial" class="form-control form-control-border" placeholder="Enter Faculty Middle Initial">
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



    <div class="modal fade" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <label for="edit_last_name" class="control-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control form-control-border" placeholder="Enter Faculty Last Name" required>
                    </div>
                    <div class="modal-body">
                        <label for="edit_first_name" class="control-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control form-control-border" placeholder="Enter Faculty First Name" required>
                    </div>
                    <div class="modal-body">
                        <label for="edit_middle_name" class="control-label">Middle Initial</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control form-control-border" placeholder="Enter Faculty Middle Initial">
                    </div>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <div class="modal-body">Are you sure you want to delete this Faculty permanently?</div>
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
                    var lastname = $(this).data('last_name');
                    var firstname = $(this).data('first_name');
                    var middleinitial = $(this).data('middle_name');

                    // Open the modal
                    $('#editFaculty').modal('show');

                    // Set form field values
                    $('#edit_lastname').val(lastname);
                    $('#edit_firstname').val(firstname);
                    $('#edit_middleinitial').val(middleinitial);

                    // Dynamically set the form action URL
                    $('#editForm').attr('action', "{{ url('/superadmin/faculty/update') }}/" + id);
                });
            });


            $('.delete_data').on('click', function() {
                let Id = $(this).data('id');
                let actionUrl = "{{ url('superadmin/faculty/delete') }}/" + Id;
                $('#deleteForm').attr('action', actionUrl);
            });


        });
    </script>

    @vite('resources/js/jquery.min.js')
    @vite('resources/js/bootstrap.bundle.min.js')
    @vite('resources/js/jquery.easing.min.js')
    @vite('resources/js/sb-admin-2.min.js')
    @vite('resources/js/jquery.dataTables.min.js')
    @vite('resources/js/dataTables.bootstrap4.min.js')
    @vite('resources/js/datatables-demo.js')

</body>

</html>