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

    <title>CampusHub - Departments</title>


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
            <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                          
                        </div> <!-- .card -->
                    </div><!--/.col-->
               
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h4 align="center">Compute CGPA for <?php echo  $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['otherName'];?></h></strong>
                            </div>
                            <form method="post">
                            <div class="card-body">
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table class="table table-hover table-striped table-bordered">
                                       <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>FullName</th>
                                            <th>Matric No</th>
                                            <th>Level</th>
                                            <th>Semester</th>
                                            <th>Session</th>
                                            <th>Department</th>
                                            <th>Total Course Unit</th>
                                            <th>Total Score Grade Point</th>
                                            <th>GPA</th>
                                            <th>Class Of Diploma</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
                $ret=mysqli_query($con,"SELECT tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsemester.semesterName,
                tblsession.sessionName,tblstudent.firstName,tblstudent.lastName,tblstudent.matricNo, tblfinalresult.totalCourseUnit,tblfinalresult.totalScoreGradePoint,
                tblfinalresult.gpa,tblfinalresult.classOfDiploma,tblfinalresult.dateAdded,tblfinalresult.Id
                from tblfinalresult 
                INNER JOIN tbllevel ON tbllevel.Id = tblfinalresult.levelId
                INNER JOIN tblsemester ON tblsemester.Id = tblfinalresult.semesterId
                INNER JOIN tblsession ON tblsession.Id = tblfinalresult.sessionId
                INNER JOIN tblstudent ON tblstudent.matricNo = tblfinalresult.matricNo
                INNER JOIN tblfaculty ON tblfaculty.Id = tblstudent.facultyId
                INNER JOIN tbldepartment ON tbldepartment.Id = tblstudent.departmentId
                where tblfinalresult.matricNo ='$matricNo'");

                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['firstName'].' '.$row['lastName'];?></td>
                <td><?php  echo $row['matricNo'];?></td>
                <td><?php  echo $row['levelName'];?></td>
                <td><?php  echo $row['semesterName'];?></td>
                <td><?php  echo $row['sessionName'];?></td> 
                <td><?php  echo $row['departmentName'];?></td>
                <td><?php  echo $row['totalCourseUnit'];?></td>
                <td><?php  echo $row['totalScoreGradePoint'];?></td>
                <td><?php  echo $row['gpa'];?></td>
                <td><?php  echo $row['classOfDiploma'];?></td>
                <td><?php  echo $row['dateAdded'];?></td>
                <input id="" value="<?php echo $row['Id'];?>" name="Id[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['totalCourseUnit'];?>" name="totalCourseUnit[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['totalScoreGradePoint'];?>" name="totalScoreGradePoint[]"  type="hidden" class="form-control" >
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                            
                </tbody>
            </table>
            <button type="submit" name="compute" class="btn btn-success">Compute CGPA</button>
            </form>
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

    @vite('resources/js/jquery-3.6.0.min.js')
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            $(document).ready(function() {
                $('.edit_data').on('click', function() {
                    var id = $(this).data('id');
                    var title = $(this).data('title');
                    var description = $(this).data('description');

                    // Open the modal
                    $('#editDepartment').modal('show');

                    // Set form field values
                    $('#edit_deptname').val(title);
                    $('#edit_deptdescription').val(description);

                    // Dynamically set the form action URL
                    $('#editForm').attr('action', "{{ url('superadmin/department/update') }}/" + id);
                });
            });


            $('.delete_data').on('click', function() {
                let departmentId = $(this).data('id');
                let actionUrl = "{{ url('superadmin/department/delete') }}/" + departmentId;
                $('#deleteForm').attr('action', actionUrl);
            });


        });
    </script> -->










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