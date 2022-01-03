<?php
if(!isset($_SESSION['user'])){
    redirect("../login/");
}
?>
<!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=BASE_URL;?>/public/dashboard/">
         <div class="sidebar-brand-icon">
             <i class="fas fa-blog"></i>
         </div>
         <div class="sidebar-brand-text mx-2"><?=WEB_NAME;?></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?=BASE_URL;?>/public/dashboard/">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Posts Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true" aria-controls="collapsePosts">
             <i class="fas fa-fw fa-newspaper"></i>
             <span>Posts</span>
         </a>
         <div id="collapsePosts" class="collapse" aria-labelledby="headingPosts" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/posts/"><i class="fas fa-fw fa-angle-double-right"></i> All Posts</a>
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/posts/form.php"><i class="fas fa-fw fa-angle-double-right"></i> New Post</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Categories Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
             <i class="fas fa-fw fa-tags"></i>
             <span>Categories</span>
         </a>
         <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/categories/"><i class="fas fa-fw fa-angle-double-right"></i> All Categories</a>
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/categories/form.php"><i class="fas fa-fw fa-angle-double-right"></i> New Category</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Comments Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComments" aria-expanded="true" aria-controls="collapseComments">
             <i class="fas fa-fw fa-comments"></i>
             <span>Comments</span>
         </a>
         <div id="collapseComments" class="collapse" aria-labelledby="headingComments" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/comments/"><i class="fas fa-fw fa-angle-double-right"></i> All Comments</a>
             </div>
         </div>
     </li>

      <!-- Nav Item - Users Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
             <i class="fas fa-fw fa-users"></i>
             <span>Users</span>
         </a>
         <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/users/"><i class="fas fa-fw fa-angle-double-right"></i> All Users</a>
                 <a class="collapse-item" href="<?=BASE_URL;?>/public/users/form.php"><i class="fas fa-fw fa-angle-double-right"></i> New User</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Web -->
     <li class="nav-item">
         <a class="nav-link" href="<?=BASE_URL;?>">
             <i class="fas fa-fw fa-globe"></i>
             <span>Web</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button>

             <!-- Topbar Search -->
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="POST">
                 <div class="input-group">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Search for post..." aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="submit">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">
                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['user']->user_name?></span>
                         <img class="img-profile rounded-circle" src="<?= BASE_URL; ?>/assets/img/users/<?=$_SESSION['user']->user_image?>">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <!-- <a class="dropdown-item" href="#">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                             Settings
                         </a> 
                         <div class="dropdown-divider"></div>
                         -->
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->