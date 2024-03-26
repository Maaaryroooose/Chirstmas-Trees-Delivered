<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Management</title>
    <!-- Include necessary CSS and JavaScript libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

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
                <h1>Career</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Career</li>
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
                                    data-target='#addCareerModal'>
                                    <i class='fa fa-plus'></i> Add
                                </button>
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th class="hidden"></th>
                                        <th>Career Title</th>
                                        <th>Description</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM career");
                                            $stmt->execute();

                                            foreach ($stmt as $row) {
                                                echo "<tr>";
                                                echo "<td class='hidden careerId'>" . $row['career_id'] . "</td>";
                                                echo "<td>" . $row['career_title'] . "</td>";
                                                echo "<td>" . $row['career_description'] . "</td>";
                                                echo "<td>
                                                        <button type='button' class='btn btn-info btn-sm btn-flat transact' onclick='editCareer(" . $row['career_id'] . ")'>
                                                            <i class='fa fa-pencil'></i> Edit
                                                        </button>
                                                        <button type='button' class='btn btn-danger btn-sm btn-flat transact' onclick='deleteCareer(" . $row['career_id'] . ")'>
                                                            <i class='fa fa-trash'></i> Delete
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

        <!-- Add Career Modal -->
        <div class="modal fade" id="addCareerModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Career</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addCareerForm" method="POST" action="add_career.php">
                            <!-- Career Title -->
                            <div class="form-group">
                                <label for="addCareerTitle">Career Title:</label>
                                <input type="text" class="form-control" id="addCareerTitle" name="addCareerTitle" required>
                            </div>
                            <!-- Career Description -->
                            <div class="form-group">
                                <label for="addCareerDescription">Career Description:</label>
                                <textarea class="form-control" id="addCareerDescription" name="addCareerDescription" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Add Career</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Career Modal -->
        <div class="modal fade" id="editCareerModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Career</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editCareerForm" method="POST" action="edit_career.php">
                            <input type="hidden" id="editCareerId" name="editCareerId">
                            <!-- Career Title -->
                            <div class="form-group">
                                <label for="editCareerTitle">Career Title:</label>
                                <input type="text" class="form-control" id="editCareerTitle" name="editCareerTitle" required>
                            </div>
                            <!-- Career Description -->
                            <div class="form-group">
                                <label for="editCareerDescription">Career Description:</label>
                                <textarea class="form-control" id="editCareerDescription" name="editCareerDescription" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include '../includes/profile_modal.php'; ?>
        <?php include 'includes/scripts.php'; ?>

        <!-- Additional scripts -->
        <script>
            $(document).ready(function () {
                // Function to open the "Edit Career" modal
                window.editCareer = function (careerId) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_career.php', // You need to create a PHP script to fetch career information based on careerId
                        data: { careerId: careerId },
                        dataType: 'json',
                        success: function (data) {
                            // Populate the edit modal with career information
                            $('#editCareerId').val(data.career_id);
                            $('#editCareerTitle').val(data.career_title);
                            $('#editCareerDescription').val(data.career_description);
                            $('#editCareerModal').modal('show');
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                };

                // Function to delete a career
                window.deleteCareer = function (careerId) {
                    if (confirm("Are you sure you want to delete this career?")) {
                        $.ajax({
                            type: 'POST',
                            url: 'delete_career.php', // You need to create a PHP script to delete the career
                            data: { careerId: careerId },
                            success: function (response) {
                                // You can handle the response here, such as showing a success message or updating the table
                                // For simplicity, let's just reload the page
                                location.reload();
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }
                };

                // Submit the edit career form using AJAX
                $('#editCareerForm').submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'edit_career.php',
                        data: $(this).serialize(),
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
