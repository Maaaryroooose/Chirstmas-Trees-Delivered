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
                <h1>Town</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Town</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Button to trigger the modal for adding town -->
                                <button style='margin-bottom: 20px' id='addInventoryModalBtn' type='button'
                                    class='btn btn-info btn-sm btn-flat transact' data-toggle='modal'
                                    data-target='#addTownModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>

                                <!-- Table to display towns -->
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Town</th>
										<th>Zone</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $stmt = $conn->prepare("SELECT town_id, town_name, zone_id FROM town");
                                            $stmt->execute();

                                            foreach ($stmt as $row) {
                                                echo "<tr>";
                                                echo "<td class='hidden supplierId'></td>";
                                                echo "<td>" . $row['town_name'] . "</td>";
												echo "<td>" . $row['zone_id'] . "</td>";
                                                echo "<td>
                                                        <button type='button' class='btn btn-info btn-sm btn-flat transact' onclick='editTown(" . $row['town_id'] . ", \"" . $row['town_name'] . "\", \"" . $row['zone_id'] . "\")'>
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

        <!-- Add Town Modal -->
        <div class='modal' id='addTownModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Add New Town</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class='modal-body'>
                        <form method='POST' action='add_town.php'>
                            <div class='form-group'>
                                <label for='newTownName'>Town Name:</label>
                                <input type='text' class='form-control' id='newTownName' name='newTownName' required>
                            </div>
                            <div class='form-group'>
                                <label for='newZoneId'>Zone ID:</label>
                                <input type='text' class='form-control' id='newZoneId' name='newZoneId' required>
                            </div>
                            <button type='submit' class='btn btn-primary'>Add Town</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Town Modal -->
        <div class='modal' id='editTownModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Edit Town</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class='modal-body'>
                        <form method='POST' action='edit_town.php'>
                            <div class='form-group'>
                                <label for='editTownName'>Town Name:</label>
                                <input type='text' class='form-control' id='editTownName' name='editTownName' required>
                            </div>
                            <div class='form-group'>
                                <label for='editZoneId'>Zone ID:</label>
                                <input type='text' class='form-control' id='editZoneId' name='editZoneId' required>
                            </div>
                            <!-- Hidden input for passing town_id -->
                            <input type='hidden' id='editTownId' name='editTownId'>
                            <button type='submit' class='btn btn-primary'>Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>
        <?php include 'includes/scripts.php'; ?>

        <script>
            // Function to populate the edit modal with town data
            function editTown(townId, townName, zoneId) {
                // Set values in the modal
                document.getElementById('editTownId').value = townId;
                document.getElementById('editTownName').value = townName;
                document.getElementById('editZoneId').value = zoneId;

                // Show the modal
                $('#editTownModal').modal('show');
            }
        </script>
    </body>
</html>
