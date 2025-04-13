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

    <title>CampusHub - Grade Display</title>


    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-studentsidebar></x-studentsidebar>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-studenttopbar :student="$student" />
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">1st Semester Grades</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Grades for: {{ $history->year ?? 'N/A' }} Year, {{ $history->semester ?? 'N/A' }} Semester
                                <br>
                                <small>Section: {{ $history->section->title ?? 'N/A' }} ({{ $history->section->course->title ?? 'N/A' }})</small>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="bg-gradient-dark text-light">
                                            <th>Subject Code</th>
                                            <th>Description</th>
                                            <th>Prelim</th>
                                            <th>Midterm</th>
                                            <th>Finals</th>
                                            <th>AVE</th> {{-- This is Scale 2 --}}
                                            <th>Grade</th> {{-- This will be Scale 1 --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($history->grades as $grade)
                                        <tr>
                                            <td>{{ $grade->subject->name ?? 'N/A' }}</td>
                                            <td>{{ $grade->subject->description ?? 'N/A' }}</td>
                                            <td>{{ $grade->prelims ?? 'N/G' }}</td>
                                            <td>{{ $grade->midterm ?? 'N/G' }}</td>
                                            <td>{{ $grade->finals ?? 'N/G' }}</td>
                                            <td> {{-- AVE Column (Scale 2) --}}
                                                @php
                                                // Calculate Average (AVE / Scale 2)
                                                $prelim = is_numeric($grade->prelims) ? (float)$grade->prelims : null;
                                                $midterm = is_numeric($grade->midterm) ? (float)$grade->midterm : null;
                                                $finals = is_numeric($grade->finals) ? (float)$grade->finals : null;
                                                $scores = array_filter([$prelim, $midterm, $finals], fn($val) => !is_null($val));
                                                // AVE is calculated only if all three scores are present
                                                $average = (isset($prelim) && isset($midterm) && isset($finals))
                                                ? round(($prelim + $midterm + $finals) / 3, 2)
                                                : 'N/A';
                                                // --- Store average for grade calculation ---
                                                $numericAverage = ($average !== 'N/A') ? $average : null;
                                                @endphp
                                                {{ $average }}
                                            </td>
                                            <td> {{-- Grade Column (Scale 1) --}}
                                                @php
                                                $finalNumericGrade = 'N/A'; // Default value

                                                // Check if we have a valid numeric average to work with
                                                if (!is_null($numericAverage)) {
                                                // Compare average (Scale 2) to find the equivalent Grade (Scale 1)
                                                if ($numericAverage >= 96.00) {
                                                $finalNumericGrade = 1.00;
                                                } elseif ($numericAverage >= 94.00) {
                                                $finalNumericGrade = 1.25;
                                                } elseif ($numericAverage >= 91.00) {
                                                $finalNumericGrade = 1.50;
                                                } elseif ($numericAverage >= 89.00) {
                                                $finalNumericGrade = 1.75;
                                                } elseif ($numericAverage >= 86.00) {
                                                $finalNumericGrade = 2.00;
                                                } elseif ($numericAverage >= 83.00) {
                                                $finalNumericGrade = 2.25;
                                                } elseif ($numericAverage >= 80.00) {
                                                $finalNumericGrade = 2.50;
                                                } elseif ($numericAverage >= 77.00) {
                                                $finalNumericGrade = 2.75;
                                                } elseif ($numericAverage >= 75.00) {
                                                $finalNumericGrade = 3.00;
                                                } elseif ($numericAverage >= 70.00) { // 70.00 - 74.99 maps to 4.00
                                                $finalNumericGrade = 4.00;
                                                } else { // Below 70.00 (0.00 - 69.99) maps to 5.00
                                                $finalNumericGrade = 5.00;
                                                }
                                                // Format to 2 decimal places
                                                $finalNumericGrade = number_format($finalNumericGrade, 2);
                                                }
                                                // If $numericAverage was null, $finalNumericGrade remains 'N/A'
                                                @endphp
                                                {{ $finalNumericGrade }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No grades found for this period.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('student.grades.list') }}" class="btn btn-flat btn-default border btn-sm">Close</a>
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