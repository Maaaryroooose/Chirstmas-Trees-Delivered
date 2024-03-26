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
                <h1>Inventory</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Inventory</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <!-- Button to trigger the modal -->
                                <button style='margin-bottom: 20px' id='addInventoryModalBtn' type='button'
                                    class='btn btn-info btn-sm btn-flat transact' data-toggle='modal'
                                    data-target='#myModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Supplier</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Type</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM inventory");
                                            $stmt->execute();

                                            foreach ($stmt as $row) {
                                                echo "<tr>";
                                                echo "<td class='hidden supplierId'>" . $row['inventory_id'] . "</td>";
                                                echo "<td>" . $row['product_name'] . "</td>";
                                                echo "<td>" . $row['quantity'] . "</td>";

                                                // Fetch supplier details based on supplier_id from the supplier table
                                                if (isset($row['supplier_id'])) {
                                                    $supplierStmt = $conn->prepare("SELECT supplier_name FROM supplier WHERE supplier_id = :supplier_id");
                                                    $supplierStmt->bindParam(':supplier_id', $row['supplier_id']);
                                                    $supplierStmt->execute();
                                                    $supplier = $supplierStmt->fetch(PDO::FETCH_ASSOC);

                                                    echo "<td>" . $supplier['supplier_name'] . "</td>";
                                                } else {
                                                    echo "<td></td>"; // or some default value
                                                }

                                                echo "<td>" . $row['price'] . "</td>";
                                                echo "<td>" . $row['size'] . "</td>";
                                                echo "<td>" . $row['type'] . "</td>";
                                                echo "<td>
                                                        <button type='button' class='btn btn-info btn-sm btn-flat transact' onclick='editInventory(" . $row['inventory_id'] . ")'>
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
		
		<!-- Add Inventory Modal -->
<div class="modal fade" id="addInventoryModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Inventory</h4>
            </div>
            <div class="modal-body">
                <form id="addInventoryForm" method="POST" action="add_inventory.php">
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="addProductName">Product Name:</label>
                        <input type="text" class="form-control" id="addProductName" name="addProductName" required>
                    </div>
                    <!-- Quantity -->
                    <div class="form-group">
                        <label for="addQuantity">Quantity:</label>
                        <input type="text" class="form-control" id="addQuantity" name="addQuantity" required>
                    </div>
                    <!-- Supplier Dropdown -->
                    <div class="form-group">
                        <label for="addSupplier">Supplier:</label>
                        <select class="form-control" id="addSupplier" name="addSupplier" required>
                            <?php
                            // Fetch supplier data from the database
                            $supplierStmt = $conn->prepare("SELECT supplier_id, supplier_name FROM supplier");
                            $supplierStmt->execute();

                            // Loop through the results to generate options
                            foreach ($supplierStmt as $supplier) {
                                echo "<option value='" . $supplier['supplier_id'] . "'>" . $supplier['supplier_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Price -->
                    <div class="form-group">
                        <label for="addPrice">Price:</label>
                        <input type="text" class="form-control" id="addPrice" name="addPrice" required>
                    </div>
                    <!-- Size -->
                    <div class="form-group">
                        <label for="addSize">Size:</label>
                        <input type="text" class="form-control" id="addSize" name="addSize" required>
                    </div>
                    <!-- Type -->
                    <div class="form-group">
                        <label for="addType">Type:</label>
                        <input type="text" class="form-control" id="addType" name="addType" required>
                    </div>
                    <!-- Add other fields as needed -->

                    <button type="submit" class="btn btn-info">Add Inventory</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <!-- Edit Inventory Modal -->
        <div class="modal fade" id="editInventoryModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Inventory</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editInventoryForm" method="POST" action="edit_inventory.php">
                            <input type="hidden" id="editInventoryId" name="editInventoryId">
                            <!-- Product Name -->
                            <div class="form-group">
                                <label for="editProductName">Product Name:</label>
                                <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                            </div>
                            <!-- Quantity -->
                            <div class="form-group">
                                <label for="editQuantity">Quantity:</label>
                                <input type="text" class="form-control" id="editQuantity" name="editQuantity" required>
                            </div>
                            <!-- Supplier Dropdown -->
                            <div class="form-group">
                                <label for="editSupplier">Supplier:</label>
                                <select class="form-control" id="editSupplier" name="editSupplier" required>
                                    <?php
                                    // Fetch supplier data from the database
                                    $supplierStmt = $conn->prepare("SELECT supplier_id, supplier_name FROM supplier");
                                    $supplierStmt->execute();

                                    // Loop through the results to generate options
                                    foreach ($supplierStmt as $supplier) {
                                        echo "<option value='" . $supplier['supplier_id'] . "'>" . $supplier['supplier_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Price -->
                            <div class="form-group">
                                <label for="editPrice">Price:</label>
                                <input type="text" class="form-control" id="editPrice" name="editPrice" required>
                            </div>
                            <!-- Size -->
                            <div class="form-group">
                                <label for="editSize">Size:</label>
                                <input type="text" class="form-control" id="editSize" name="editSize" required>
                            </div>
                            <!-- Type -->
                            <div class="form-group">
                                <label for="editType">Type:</label>
                                <input type="text" class="form-control" id="editType" name="editType" required>
                            </div>
                            <!-- Add other fields as needed -->

                            <button type="submit" class="btn btn-info">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>
        <?php include 'includes/scripts.php'; ?>
		
		<script>
    $(document).ready(function () {
        // Function to open the "Add Inventory" modal
        $('#addInventoryModalBtn').click(function () {
            $('#addInventoryModal').modal('show');
        });

        // Submit the add inventory form using AJAX
        $('#addInventoryForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'add_inventory.php',
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

        <!-- Additional scripts -->
        <script>
            $(document).ready(function () {
                // Function to populate the edit modal with inventory information
                window.editInventory = function (inventoryId) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_inventory.php',
                        data: { inventoryId: inventoryId },
                        dataType: 'json',
                        success: function (data) {
                            // Populate the edit modal with inventory information
                            $('#editInventoryId').val(data.inventory_id);
                            $('#editProductName').val(data.product_name);
                            $('#editQuantity').val(data.quantity);
                            $('#editSupplier').val(data.supplier_id); // Set the selected supplier
                            $('#editPrice').val(data.price);
                            $('#editSize').val(data.size);
                            $('#editType').val(data.type);
                            // Add other fields as needed
                            $('#editInventoryModal').modal('show');
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                };

                // Submit the edit form using AJAX
                $('#editInventoryForm').submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'edit_inventory.php',
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
