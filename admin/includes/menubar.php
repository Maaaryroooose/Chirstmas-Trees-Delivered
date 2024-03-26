<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li><a href="https://dashboard.stripe.com/test/developers" target="_blank"><i class="fa fa-credit-card-alt"></i> <span>Payment Management</span></a></li>
      <li class="header">MANAGE</li>
      <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-barcode"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products.php"><i class="fa fa-circle-o"></i> Product List</a></li>
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
        </ul>
      </li>
	  <li><a href="orders.php"><i class="fa fa-first-order"></i> <span>Orders</span></a></li>
	  <li><a href="town.php"><i class="fa fa-map-marker"></i> <span>Town</span></a></li>
	  <li><a href="delivery.php"><i class="fa fa-truck"></i> <span>Delivery</span></a></li>
	  <li><a href="driver.php"><i class="fa fa-car"></i> <span>Drivers</span></a></li>
	  <li><a href="supplier.php"><i class="fa fa-industry"></i> <span>Supplier</span></a></li>
	  <li><a href="career.php"><i class="fa fa-line-chart"></i> <span>Career</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>