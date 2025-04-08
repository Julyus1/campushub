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
    @vite('public/vendor/fontawesome-free/css/all.min.css')

    <title>CampusHub - {{ $section->title }} Subjects</title>

    @vite('resources/css/sb-admin-2.min.css')

    <style>
        .min-height {
            min-height: 200px;
        }
    </style>

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
                <x-superadmintopbar></x-superadmintopbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">{{ $section->title }} - Subjects</h1>
                    </div>

                    <!-- Subjects Listing -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Subjects in {{ $section->title }}</h6>
                            <!-- Add Subject Button -->
                            <div class="d-inline-block btn btn-sm btn-success shadow-sm add-btn" data-toggle="modal" data-target="#addSubject"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Add Subject</div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($section->subjects as $subject)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $subject->name }}
                                    <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-sm btn-info">
                                        View Details
                                    </a>
                                </li>
                                @empty
                                <li class="list-group-item text-muted">No subjects assigned to this section.</li>
                                @endforelse
                            </ul>
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

    <form method="POST" action=''>
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
                        <input type="hidden" name="section_id" value="{{ $section->id }}">
                        <label for="subjectname" class="control-label">Subject</label>
                        <select name="section_id" id="subjectname" class="form-control form-control-sm form-control-border" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

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