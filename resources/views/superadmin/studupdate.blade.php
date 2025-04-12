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

    <title>CampusHub - Student Update</title>


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

                    <!-- Student Information Form -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Student -{{ $student->lastname . ", " . $student->firstname}}</h6>
                        </div>
                        <form method="POST" action="{{ url('superadmin/student/update/' . $student->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="container-fluid">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <fieldset class="border-bottom">
                                        <label>
                                            <h3>Student Profile</h3>
                                        </label>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="yearlevel" class="control-label">Year Level: </label>
                                                <select name="year_level" id="yearlevel" class="form-control form-control-sm rounded-0" required>
                                                    <option value="Others" {{ $student->year_level == 'Others' ? 'selected' : '' }}>Others</option>
                                                    <option value="3rd Year" {{ $student->year_level == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email" class="control-label">Email: </label>
                                                <input type="text" name="email" id="email" value="{{ $student->email }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="section_id" class="control-label">Section: </label>
                                                <select name="section_id" id="section_id" class="form-control form-control-sm rounded-0" required>

                                                    @foreach($sections as $section)
                                                    <option value="{{ $section->id }}" {{ $student->section_id == $section->id ? 'selected' : '' }}>
                                                        {{ $section->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="course" class="control-label">Course: </label>
                                                <select name="course" id="course" class="form-control form-control-sm rounded-0" required>
                                                    <option value="">Select Course</option>
                                                    @foreach($courses as $course)
                                                    <option value="{{ $course->id }}" {{ $student->course == $course->id ? 'selected' : '' }}>
                                                        {{ $course->title }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="contact" class="control-label">Contact #</label>
                                                <input type="text" name="contact" id="contact" value="{{ $student->contact }}" class="form-control form-control-sm rounded-0" required maxlength="13">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="firstname" class="control-label">First Name: </label>
                                                <input type="text" name="firstname" id="firstname" value="{{ $student->firstname }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="middlename" class="control-label">Middle Name: </label>
                                                <input type="text" name="middlename" id="middlename" value="{{ $student->middlename }}" class="form-control form-control-sm rounded-0" placeholder="optional">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="lastname" class="control-label">Last Name: </label>
                                                <input type="text" name="lastname" id="lastname" value="{{ $student->lastname }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="gender" class="control-label">Gender: </label>
                                                <select name="gender" id="gender" class="form-control form-control-sm rounded-0" required>
                                                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="dob" class="control-label">Date of Birth: </label>
                                                <input type="date" name="birthdate" id="dob" value="{{ $student->birthdate }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="nationality" class="control-label">Nationality: </label>
                                                <select name="nationality" id="nationality" class="form-control form-control-sm rounded-0" required>
                                                    <option value="Filipino" {{ $student->nationality == 'Filipino' ? 'selected' : '' }}>Filipino</option>
                                                    <option value="Foreign" {{ $student->nationality == 'Foreign' ? 'selected' : '' }}>Foreign</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="religion" class="control-label">Religion: </label>
                                                <input type="text" name="religion" id="religion" value="{{ $student->religion }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="origin" class="control-label">Province of Origin: </label>
                                                <input type="text" name="origin" id="origin" value="{{ $student->origin }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="birthplace" class="control-label">Place of Birth: </label>
                                                <input type="text" name="birthplace" id="birthplace" value="{{ $student->birthplace }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="civilstatus" class="control-label">Civil Status: </label>
                                                <select name="civilstatus" id="civilstatus" class="form-control form-control-sm rounded-0" required>
                                                    <option value="Single" {{ $student->civilstatus == 'Single' ? 'selected' : '' }}>Single</option>
                                                    <option value="Married" {{ $student->civilstatus == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Widdowed" {{ $student->civilstatus == 'Widdowed' ? 'selected' : '' }}>Widdowed</option>
                                                </select>
                                            </div>
                                        </div>

                                        <label>
                                            <h3>Complete Address</h3>
                                        </label>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="stname" class="control-label">Number & Street Name: </label>
                                                <input type="text" name="stname" id="stname" value="{{ $student->stname }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="brgy" class="control-label">Brgy, Bario, Village, Subdivision: </label>
                                                <input type="text" name="brgy" id="brgy" value="{{ $student->brgy }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="city" class="control-label">Municipality, City: </label>
                                                <input type="text" name="city" id="city" value="{{ $student->city }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="province" class="control-label">Province: </label>
                                                <input type="text" name="province" id="province" value="{{ $student->province }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="postalcode" class="control-label">Postal Code: </label>
                                                <input type="text" name="postalcode" id="postalcode" value="{{ $student->postalcode }}" class="form-control form-control-sm rounded-0" required maxlength="4">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="homenumber" class="control-label">Home Phone No.: </label>
                                                <input type="text" name="homenumber" id="homenumber" value="{{ $student->homenumber }}" class="form-control form-control-sm rounded-0" maxlength="9">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="mobilenumber" class="control-label">Mobile Phone No.: </label>
                                                <input type="text" name="mobilenumber" id="mobilenumber" value="{{ $student->mobilenumber }}" class="form-control form-control-sm rounded-0" required maxlength="13">
                                            </div>
                                        </div>

                                        <label>
                                            <h3>In Case of Emergency</h3>
                                        </label>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="emergencyperson" class="control-label">Emergency Contact Person: </label>
                                                <input type="text" name="emergencyperson" id="emergencyperson" value="{{ $student->emergencyperson }}" class="form-control form-control-sm rounded-0" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="relationship" class="control-label">Relationship: </label>
                                                <select name="relationship" id="relationship" class="form-control form-control-sm rounded-0" required>
                                                    <option value="Father" {{ $student->relationship == 'Father' ? 'selected' : '' }}>Father</option>
                                                    <option value="Mother" {{ $student->relationship == 'Mother' ? 'selected' : '' }}>Mother</option>
                                                    <option value="Guardian" {{ $student->relationship == 'Guardian' ? 'selected' : '' }}>Guardian</option>
                                                    <option value="Partner" {{ $student->relationship == 'Partner' ? 'selected' : '' }}>Partner</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="emergencycontact" class="control-label">Emergency Contact No.: </label>
                                                <input type="text" name="emergencycontact" id="emergencycontact" value="{{ $student->emergencycontact }}" class="form-control form-control-sm rounded-0" maxlength="13">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-flat btn-primary btn-sm" type="submit">Save Student Details</button>
                                <a href="./?page=students" class="btn btn-flat btn-default border btn-sm">Cancel</a>
                            </div>
                        </form>
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
        document.getElementById("contact").addEventListener("input", function(e) {
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
        document.getElementById("postalcode").addEventListener("input", function(e) {
            let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
            if (value.length > 4) value = value.substring(0, 4); // Limit to 4 digits
            e.target.value = value;
        });
    </script>

    <!-- home no script-->
    <script>
        document.getElementById("homenumber").addEventListener("input", function(e) {
            let value = e.target.value.replace(/\D/g, ""); // Remove non-numeric characters
            if (value.length >= 3 && value.length <= 7) value = value.replace(/(\d{3})(\d{1,4})/, "$1-$2");
            if (value.length > 9) value = value.substring(0, 9); // Limit to 9 characters
            e.target.value = value;
        });
    </script>

    <!-- mobile no script -->
    <script>
        document.getElementById("mobilenumber").addEventListener("input", function(e) {
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
        document.getElementById("emergencycontact").addEventListener("input", function(e) {
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