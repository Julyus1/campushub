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

    <title>CampusHub - Class Scheduling</title>


    @vite('resources/css/sb-admin-2.min.css')

    <!-- Custom Styles -->
    <style>
        .section-title,
        .section-title:hover {
            text-decoration: none;
            color: gold;
        }

        .img-thumb-path {
            width: 100px;
            height: 80px;
            object-fit: scale-down;
            object-position: center center;
        }

        label {
            font-weight: bold;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-adminsidebar></x-adminsidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-admintopbar>
                </x-admintopbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Class Scheduling</h1>
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

                    <!-- Student Information Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Class Schedule of </h6>
                        </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                            <!-- Class Schedule Form -->
                                            <form method="POST" action="{{ route('admin.class.schedule.store') }}">
                                                @csrf
                                    
                                                <div class="form-group">
                                                    <label for="subject_id">Subject</label>
                                                    <select name="subject_id" id="subject_id" class="form-control" required>
                                                        <option value="">-- Select Subject --</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                    
                                                <div class="form-group">
                                                    <label for="day">Day</label>
                                                    <select name="day" id="day" class="form-control" required>
                                                        <option value="">-- Select Day --</option>
                                                        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'] as $day)
                                                            <option value="{{ $day }}">{{ $day }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                    
                                                <div class="form-group">
                                                    <label for="start_time">Start Time</label>
                                                    <input type="time" class="form-control" name="start_time" id="start_time" required>
                                                </div>
                                    
                                                <div class="form-group">
                                                    <label for="end_time">End Time</label>
                                                    <input type="time" class="form-control" name="end_time" id="end_time" required>
                                                </div>
                                    
                                                <button type="submit" class="btn btn-success">Save Schedule</button>
                                            </form>
                                    
                                            <!-- Schedule Table -->
                                            <hr>
                                            <h5 class="mt-4">Current Schedules</h5>
                                            <table class="table table-bordered mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Day</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($schedules as $schedule)
                                                        <tr>
                                                            <td>{{ $schedule->subject->name }}</td>
                                                            <td>{{ $schedule->day }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">No schedules available.</td>
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


    <!-- contact script-->
<script>
    document.getElementById("contact").addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
        if (value.startsWith("9")) value = "0" + value; // Ensure 09XX format
    
        if (value.length > 11) value = value.substring(0, 11); // Max length for 09XX-XXX-XXXX
        if (value.length >= 5) value = value.replace(/(\d{4})(\d{3})/, "$1-$2-");
        if (value.length >= 9) value = value.replace(/(\d{4})-(\d{3})(\d{4})/, "$1-$2-$3");
    
        e.target.value = value;
    });
</script>

<!-- postal script-->
<script>
document.getElementById("postalcode").addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
    if (value.length > 4) value = value.substring(0, 4); // Limit to 4 digits
    e.target.value = value;
});
</script>

<!-- home no script-->
<script>
document.getElementById("homenumber").addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
    if (value.length >= 3 && value.length <= 7) value = value.replace(/(\d{3})(\d{1,4})/, "$1-$2");
    if (value.length > 9) value = value.substring(0, 9); // Limit to 9 characters
    e.target.value = value;
});
</script>

<!-- mobile no script -->
<script>
document.getElementById("mobilenumber").addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
    if (value.startsWith("9")) value = "0" + value; // Ensure 09XX format

    if (value.length > 11) value = value.substring(0, 11); // Max length
    if (value.length >= 5) value = value.replace(/(\d{4})(\d{3})/, "$1-$2-");
    if (value.length >= 9) value = value.replace(/(\d{4})-(\d{3})(\d{4})/, "$1-$2-$3");

    e.target.value = value;
});
</script>

<!-- emergency contact -->
<script>
document.getElementById("emergencycontact").addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
    if (value.startsWith("9")) value = "0" + value; // Ensure it starts with 09XX

    if (value.length > 11) value = value.substring(0, 11); // Limit to 11 digits
    if (value.length >= 5) value = value.replace(/(\d{4})(\d{3})/, "$1-$2-");
    if (value.length >= 9) value = value.replace(/(\d{4})-(\d{3})(\d{4})/, "$1-$2-$3");

    e.target.value = value;
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