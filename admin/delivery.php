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
                <h1>
                    Delivery
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Delivery</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Button to trigger the modal -->
                                <button style='margin-bottom: 20px' type='button' class='btn btn-info btn-sm btn-flat transact' data-toggle='modal' data-target='#addDeliveryModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>
                                <button style='margin-bottom: 20px' type='button' class='btn btn-success btn-sm btn-flat' id='printButton'>
                                    <i class='fa fa-print'></i> Print
                                </button>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Driver's Name</th>
                                        <th>Status</th>
                                        <th>Delivery Date</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $stmt = $conn->prepare("SELECT delivery.delivery_id, driver.driver_name, delivery.status, delivery.delivery_date 
                                              FROM delivery 
                                              INNER JOIN driver ON delivery.driver_id = driver.driver_id
                                              ");
                                            $stmt->execute();

                                            foreach ($stmt as $row) {
                                                echo "<tr>";
                                                echo "<td class='hidden driverId'>" . $row['delivery_id'] . "</td>";
                                                echo "<td>" . $row['driver_name'] . "</td>";
                                                echo "<td><input type='checkbox' class='status-checkbox' " . ($row['status'] ? 'checked' : '') . " data-delivery-id='" . $row['delivery_id'] . "'></td>";
                                                echo "<td>" . $row['delivery_date'] . "</td>";
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
		
		<!-- Add Delivery Modal -->
<div class="modal fade" id="addDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Delivery</h4>
            </div>
            <form id="addDeliveryForm" method="POST" action="add_delivery.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Driver Name:</label>
                        <select class="form-control" name="driver_id" required>
                            <!-- Populate with driver names from database -->
                            <?php
                            try {
                                $stmt = $conn->prepare("SELECT driver_id, driver_name FROM driver");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                    echo "<option value='" . $row['driver_id'] . "'>" . $row['driver_name'] . "</option>";
                                }
                            } catch (PDOException $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Delivery Date:</label>
                        <input type="date" class="form-control" name="delivery_date" required>
                    </div>
                    <div class="form-group">
                        <label>Status:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="status" name="status" value="1">
                            <label class="form-check-label" for="status">Delivered</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



        <?php include 'includes/footer.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>

    </div>
    <!-- ./wrapper -->

    

    <?php include 'includes/scripts.php'; ?>

    <script>
        $(document).ready(function() {
            $('#printButton').click(function() {
                // Open a new window or tab with the content of generate_pdf.php
                var printWindow = window.open('generate_pdf.php', '_blank');

                // When the new window/tab is loaded, trigger the print dialog
                printWindow.onload = function() {
                    printWindow.print();
                };
            });
        });
    </script>
	<script>
    $(document).ready(function() {
        $('#addDeliveryForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(data) {
                    $('#addDeliveryModal').modal('hide');
                    // Reload or update the delivery table on success
                    // For demonstration purposes, you can reload the current page
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error adding delivery. Please try again.');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.status-checkbox').change(function() {
            var deliveryId = $(this).data('delivery-id');
            var status = this.checked ? 1 : 0;

            $.ajax({
                url: 'update_status.php',
                type: 'POST',
                data: { delivery_id: deliveryId, status: status },
                success: function(response) {
                    console.log('Status updated successfully.');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error updating status.');
                }
            });
        });
    });
</script>



</body>
</html>
