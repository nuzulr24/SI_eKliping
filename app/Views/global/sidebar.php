<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-text mx-3">E-KLIPING</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-3">

<!-- Heading -->
<div class="sidebar-heading">
  Navigation
</div>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url();?>">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span></a>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('news');?>">
    <i class="fas fa-fw fa-newspaper"></i>
    <span>News</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('users');?>">
    <i class="fas fa-fw fa-users"></i>
    <span>Users</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('media');?>">
    <i class="fas fa-fw fa-image"></i>
    <span>Media</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('profile');?>">
    <i class="fas fa-fw fa-user"></i>
    <span>Profile</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->