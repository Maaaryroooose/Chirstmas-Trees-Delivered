<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Drivers</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Drivers</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Button to trigger the Add modal -->
                                <button style='margin-bottom: 20px' type='button'
                                    class='btn btn-info btn-sm btn-flat' data-toggle='modal'
                                    data-target='#addDriverModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Driver's Name</th>
                                        <th>Photo</th>
                                        <th>Phone</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $stmt = $conn->prepare("SELECT driver_id, driver_name, driver_photo, driver_phone FROM driver");
                                            $stmt->execute();

                                            foreach ($stmt as $row) {
                                                echo "<tr>";
                                                echo "<td class='hidden driverId'>" . $row['driver_id'] . "</td>";
                                                echo "<td>" . $row['driver_name'] . "</td>";
                                                echo "<td><img src='" . '../images/'.$row['driver_photo'] . "' alt='Driver Photo' style='max-width: 40px; max-height: 40px;'></td>";
                                                echo "<td>" . $row['driver_phone'] . "</td>";
                                                echo "<td>
                                                        <button type='button' class='btn btn-info btn-sm btn-flat edit-driver'
                                                            data-driverid='" . $row['driver_id'] . "'
                                                            data-drivername='" . $row['driver_name'] . "'
                                                            data-driverphoto='" . $row['driver_photo'] . "'
                                                            data-driverphone='" . $row['driver_phone'] . "'>
                                                            <i class='fa fa-pencil'></i> Edit
                                                        </button>
                                                      </td>";
                                                echo "</tr>";
                                            }
                                        } catch (PDOException $e) {
                                            echo $e->getMessage();
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Add Driver Modal -->
        <div class="modal fade" id="addDriverModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Driver</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addDriverForm" method="POST" action="add_driver.php">
                            <!-- Driver's Name -->
                            <div class="form-group">
                                <label for="addDriverName">Driver's Name:</label>
                                <input type="text" class="form-control" id="addDriverName" name="addDriverName" required>
                            </div>
                            <!-- Photo -->
                            <div class="form-group">
                                <label for="addDriverPhoto">Photo:</label>
                                <input type="file" class="form-control" id="addDriverPhoto" name="addDriverPhoto" accept="image/*" required>
                            </div>
                            <!-- Phone -->
                            <div class="form-group">
                                <label for="addDriverPhone">Phone:</label>
                                <input type="text" class="form-control" id="addDriverPhone" name="addDriverPhone" required>
                            </div>
                            <!-- Add other input fields as needed -->
                            <button type="submit" class="btn btn-info">Add Driver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Driver Modal -->
        <div class="modal fade" id="editDriverModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Driver</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editDriverForm" method="POST" action="edit_driver.php" enctype="multipart/form-data">
    <!-- Hidden field for driver ID -->
    <input type="hidden" id="editDriverId" name="editDriverId">

    <!-- Driver's Name -->
    <div class="form-group">
        <label for="editDriverName">Driver's Name:</label>
        <input type="text" class="form-control" id="editDriverName" name="editDriverName" required>
    </div>
    <!-- Current Driver Photo -->
    <div class="form-group">
        <label>Current Photo:</label>
        <img id="currentDriverPhoto" src="" alt="Current Driver Photo" style="max-width: 100px;">
    </div>
    <!-- New Photo (optional) -->
    <div class="form-group">
        <label for="editDriverPhoto">New Photo (optional):</label>
        <input type="file" class="form-control" id="editDriverPhoto" name="editDriverPhoto" accept="image/*">
    </div>
    <!-- Phone -->
    <div class="form-group">
        <label for="editDriverPhone">Phone:</label>
        <input type="text" class="form-control" id="editDriverPhone" name="editDriverPhone" required>
    </div>
    <!-- Add other input fields as needed -->
    <button type="submit" class="btn btn-info">Save Changes</button>
</form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>
    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>

    <!-- Add Driver Modal Script -->
    <script>
        $(document).ready(function () {
            $('.transact').click(function () {
                $('#addDriverForm')[0].reset();
                $('#addDriverModal').modal('show');
            });
        });
    </script>

    <!-- Edit Driver Modal Script -->
    <script>
        $(document).on('click', '.edit-driver', function () {
            $('#editDriverForm')[0].reset();

            var driverId = $(this).data('driverid');
            var driverName = $(this).data('drivername');
            var driverPhoto = $(this).data('driverphoto');
            var driverPhone = $(this).data('driverphone');

            $('#editDriverId').val(driverId);
            $('#editDriverName').val(driverName);
            $('#currentDriverPhoto').attr('src', '../images/' + driverPhoto);
            $('#editDriverPhone').val(driverPhone);

            $('#editDriverModal').modal('show');
        });
    </script>
</body>
</html>
