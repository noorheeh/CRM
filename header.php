<?php
echo '
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="index.php" class="nav-link">Home</a>
</li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

<li class="nav-item">
<a class="nav-link" data-widget="fullscreen" href="#" role="button">
<i class="fas fa-expand-arrows-alt"></i>
</a>
</li>
<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<img class="img-profile rounded-circle" width="30" height="30" 
src="dist/img/user.jpg">
<span class="mr-2 d-none d-lg-inline">'. $_SESSION["user"] .'</span>
</a>
<!-- Dropdown - User Information -->
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
aria-labelledby="userDropdown">
<a id="profile" class="dropdown-item" href="#">
<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
Profile
</a>
<div class="dropdown-divider"></div>
<a id="logout" class="dropdown-item" href="logout.php">
<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
Logout
</a>
</div>
</li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a id="index" href="index.php" class="brand-link">
<img src="dist/img/crm.jpg" alt="CRM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">CRM</span>
</a>

<!-- Sidebar -->
<div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-item home">
<a id="home" href="index.php" class="nav-link">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Home
</p>
</a>
</li>
<li class="nav-item calendar">
<a id="calendar" href="calendar.php" class="nav-link">
<i class="nav-icon far fa-calendar-alt"></i>
<p>
Calendar
</p>
</a>
</li>
<li class="nav-item add-customer">
<a id="add-customer" href="add_customer.php" class="nav-link">
<i class="nav-icon fas fa-edit"></i>
<p>
Add Customer
</p>
</a>
</li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
';

?>