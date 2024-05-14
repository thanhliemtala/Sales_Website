<?php
require_once('views\admin\metadata.php'); ?>
<div class="dashboard">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="public/images/logo/logo_nike.png" alt="#" /></a>
                     </div>
                  </div>

                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="public/images/logo/logo_icon.png" alt="#" /></div>
                        <div class="user_info">
                           <h6>Hi admin!</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user white_color"></i> <span>Profile</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="">> <span>Admin</span></a>
                           </li>
                           <li>
                              <a href="">> <span>User</span></a>
                           </li>
                        </ul>
                     </li>
                     <li><a href="map.html"><i class="fa fa-tag white_color"></i> <span>Products</span></a></li>
                     <li><a href="widgets.html"><i class="fa fa-comment white_color"></i> <span>Comment</span></a></li>
                     <li><a href="price.html"><i class="fa fa-shopping-cart white_color"></i> <span>Order</span></a></li>
                     <li><a href="tables.html"><i class="fa fa-rss white_color"></i> <span>News</span></a></li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane white_color"></i> <span>Client contact</span></a>
                     </li>
                     <li><a href="charts.html"><i class="fa fa-info-circle white_color"></i> <span>About</span></a></li>


                    
                     <li><a href="settings.html"><i class="fa fa-cog white_color"></i> <span>Settings</span></a></li>
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul class="mr-3">
                                 <li class="mx-1"><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>                                 
                                 <li class="mx-1"><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">1</span></a></li>
                                 <li class="mx-1"><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li class="mx-1">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-lg" style="color: white"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a class="dropdown-item text-dark" href="profile.html">My Profile</a>
                                       <a class="dropdown-item text-dark" href="settings.html">Settings</a>
                                       <a class="dropdown-item text-dark" href="help.html">Help</a>
                                       <a class="dropdown-item text-dark" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               