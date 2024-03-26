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
                <h1>Orders List</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Orders</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-warning'></i> Error!</h4>
                        " . $_SESSION['error'] . "
                    </div>
                    ";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4><i class='icon fa fa-check'></i> Success!</h4>
                        " . $_SESSION['success'] . "
                    </div>
                    ";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addOrderModal" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>City/Town</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try {
                                            $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
                                            $stmt->execute(['type' => 0]);
                                            foreach ($stmt as $row) {
                                                $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
                                                $status = ($row['status']) ? '<span class="label label-success">active</span>' : '<span class="label label-danger">not verified</span>';
                                                $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="' . $row['id'] . '"><i class="fa fa-check-square-o"></i></a></span>' : '';
                                                echo "
                                                <tr>
                                                    
                                                    <td>" . $row['email'] . "</td>
                                                    <td>" . $row['firstname'] . ' ' . $row['lastname'] . "</td>
                                                    <td>" . $row['city'] . "</td>
                                                    <td>" . $row['address'] . "</td>
                                                    <td>" . $row['contact_info'] . "</td>
                                                    <td>
                                                        <button class='btn btn-success btn-sm edit btn-flat' data-id=''><i class='fa fa-search'></i> View</button>
                                                    </td>
                                                </tr>
                                                ";
                                            }
                                        } catch (PDOException $e) {
                                            echo $e->getMessage();
                                        }

                                        $pdo->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Add Order Modal -->
        <div class="modal" id="addOrderModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Order</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="POST" action="add_order.php">
                    <div class="form-group">
                        <label for="orderEmail">Email:</label>
                        <input type="email" class="form-control" id="orderEmail" name="orderEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="orderFirstName">First Name:</label>
                        <input type="text" class="form-control" id="orderFirstName" name="orderFirstName" required>
                    </div>
                    <div class="form-group">
                        <label for="orderLastName">Last Name:</label>
                        <input type="text" class="form-control" id="orderLastName" name="orderLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="orderCity">City/Town:</label>
                        <input type="text" class="form-control" id="orderCity" name="orderCity" required>
                    </div>
                    <div class="form-group">
                        <label for="orderAddress">Address:</label>
                        <textarea class="form-control" id="orderAddress" name="orderAddress" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="orderPhone">Phone:</label>
                        <input type="text" class="form-control" id="orderPhone" name="orderPhone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Order</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Add Order Modal -->

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/scripts.php'; ?>
    </div>
</body>
</html>
