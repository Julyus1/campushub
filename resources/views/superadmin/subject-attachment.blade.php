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

    <title>CampusHub - Subjects Attachment</title>


    <!-- Custom styles for this template-->
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
                <x-superadmintopbar>
                </x-superadmintopbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Subject and Section Attachment</h1>
                    </div>

                    <!-- Success Message -->


                    <!-- Filtering Options -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Attach Subjects to Sections</h6>

                        </div>

                        <!-- Drag and Drop Interface -->
                        <div class="container mt-4">
                            @foreach ($departments as $department)
                            <div class="card mt-4"> <!-- Adds spacing between department cards -->
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">{{ $department->title }}</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($department->sections as $section)
                                        <li class="list-group-item">
                                            <a href="{{ url('superadmin/section/subjects', $section->id) }}" class="text-decoration-none">
                                                {{ $section->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
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

    <!-- JavaScript for Filtering and Drag & Drop -->
    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event, target) {
            event.preventDefault();
            let subjectId = event.dataTransfer.getData("text");
            let subjectElement = document.getElementById(subjectId).cloneNode(true); // Clone subject for duplication
            subjectElement.removeAttribute("id"); // Remove ID to allow duplicates
            subjectElement.setAttribute("draggable", "false"); // Prevent dragging once assigned
            target.appendChild(subjectElement);
        }

        function filterSections() {
            let department = document.getElementById("departmentFilter").value;
            let course = document.getElementById("courseFilter").value;

            document.querySelectorAll("#sectionList .list-group-item").forEach(section => {
                let sectionDepartment = section.getAttribute("data-department");
                let sectionCourse = section.getAttribute("data-course");

                if ((department === "" || department === sectionDepartment) &&
                    (course === "" || course === sectionCourse)) {
                    section.style.display = "";
                } else {
                    section.style.display = "none";
                }
            });
        }

        function saveAssignments() {
            let sections = {};
            document.querySelectorAll('.list-group.border p-2 ul').forEach(section => {
                let sectionId = section.id;
                let subjects = [];
                section.querySelectorAll('li').forEach(subject => {
                    subjects.push(subject.textContent);
                });
                sections[sectionId] = subjects;
            });

            console.log("Saved Assignments:", sections);
            alert("Assignments saved! Check the console for details.");
        }
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