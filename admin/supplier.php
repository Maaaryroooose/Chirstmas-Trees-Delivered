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
                <h1>Supplier</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Supplier</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Button to trigger the modal -->
                                <button style='margin-bottom: 20px' type='button'
                                    class='btn btn-info btn-sm btn-flat transact' data-toggle='modal'
                                    data-target='#myModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Supplier Name</th>
                                        <th>Photo</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            try {
                                                $stmt = $conn->prepare("SELECT supplier_id, supplier_name, supplier_photo, supplier_location, supplier_phone FROM supplier");
                                                $stmt->execute();

                                                foreach ($stmt as $row) {
                                                    echo "<tr>";
                                                    echo "<td class='hidden supplierId'>" . $row['supplier_id'] . "</td>";
                                                    echo "<td>" . $row['supplier_name'] . "</td>";
                                                    echo "<td><img src='" . '../images/'.$row['supplier_photo'] . "' alt='Supplier Photo' style='max-width: 40px; max-height: 40px;'></td>";
                                                    echo "<td>" . $row['supplier_location'] . "</td>";
                                                    echo "<td>" . $row['supplier_phone'] . "</td>";
                                                    echo "<td>
                                                            <button type='button' class='btn btn-info btn-sm btn-flat transact' onclick='editSupplier(" . $row['supplier_id'] . ")'>
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

        <!-- Add Supplier Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Supplier</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addSupplierForm" method="POST" action="add_supplier.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="supplierName">Supplier Name:</label>
                                <input type="text" class="form-control" id="supplierName" name="supplierName" required>
                            </div>
                            <div class="form-group">
                                <label for="supplierPhoto">Supplier Photo:</label>
                                <input type="file" class="form-control" id="supplierPhoto" name="supplierPhoto" required>
                            </div>
                            <div class="form-group">
                                <label for="supplierLocation">Location:</label>
                                <input type="text" class="form-control" id="supplierLocation" name="supplierLocation" required>
                            </div>
                            <div class="form-group">
                                <label for="supplierPhone">Phone:</label>
                                <input type="text" class="form-control" id="supplierPhone" name="supplierPhone" required>
                            </div>
                            <button type="submit" class="btn btn-info">Add Supplier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Supplier Modal -->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" style="color:red; font-size: 42px;" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Supplier</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editSupplierForm" method="POST" action="edit_supplier.php">
                            <input type="hidden" id="editSupplierId" name="editSupplierId">
                            <div class="form-group">
                                <label for="editSupplierName">Supplier Name:</label>
                                <input type="text" class="form-control" id="editSupplierName" name="editSupplierName" required>
                            </div>
                            <div class="form-group">
                                <label for="editSupplierPhoto">Supplier Photo:</label>
                                <input type="file" class="form-control" id="editSupplierPhoto" name="editSupplierPhoto">
                            </div>
                            <div class="form-group">
                                <label for="editSupplierLocation">Location:</label>
                                <input type="text" class="form-control" id="editSupplierLocation" name="editSupplierLocation" required>
                            </div>
                            <div class="form-group">
                                <label for="editSupplierPhone">Phone:</label>
                                <input type="text" class="form-control" id="editSupplierPhone" name="editSupplierPhone" required>
                            </div>
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

    <!-- Script to submit the form using AJAX -->
    <script>
        $(document).ready(function () {
            $('#addSupplierForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_supplier.php',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            // Function to populate the edit modal with supplier information
            window.editSupplier = function (supplierId) {
                $.ajax({
                    type: 'POST',
                    url: 'get_supplier.php', // Replace with the actual PHP file to retrieve supplier information
                    data: { supplierId: supplierId },
                    dataType: 'json',
                    success: function (data) {
                        // Populate the edit modal with supplier information
                        $('#editSupplierId').val(data.supplier_id);
                        $('#editSupplierName').val(data.supplier_name);
                        $('#editSupplierLocation').val(data.supplier_location);
                        $('#editSupplierPhone').val(data.supplier_phone);
                        // You may choose to load the existing photo or leave it as is
                        // $('#editSupplierPhoto').val(data.supplier_photo);
                        $('#editModal').modal('show');
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            };

            // Submit the edit form using AJAX
            $('#editSupplierForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'edit_supplier.php', // Replace with the actual PHP file to handle form submission
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        // You can handle the response here, such as showing a success message or updating the table
                        // For simplicity, let's just reload the page
                        location.reload();
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>
