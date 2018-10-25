<?php
require_once 'class/xl_phanquyen.php';
$xlphanquyen = new xl_phanquyen();
$listchucnang = $xlphanquyen->chucnang($_SESSION['ma']);
//xemmang($chucnang);
$admin = $xlphanquyen->docadmin();
//echo $admin->Ten;
?>

<div class="w3_agileits_top_nav">
  <ul id="gn-menu" class="gn-menu-main">
    <!-- /nav_agile_w3l -->
    <li class="gn-trigger"> <a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
      <nav class="gn-menu-wrapper">
        <div class="gn-scroller scrollbar1" tabindex="5000" style="overflow: hidden; outline: none;">
          <ul class="gn-menu agile_menu_drop">
            <li><a href="index.php"> <i class="fa fa-tachometer"></i> Tổng quan</a></li>
            <?php 
			if($admin->Ten == $_SESSION['ten'])
			{
				echo '<li><a href="?page=phanquyen"> <i class="fa fa-tachometer"></i> Phân quyền</a></li>';
				$dscn = $xlphanquyen->docchucnangtheocha(0);
				foreach($dscn as $cn)
				{
					$dscncon = $xlphanquyen->docchucnangtheocha($cn->Ma);
					echo '<li><a href="'.$cn->Duong_dan.'"> <i class="fa fa-tachometer"></i> '.$cn->Ten .'</a></li>';
					foreach($dscncon as $cncon)
					{
						echo '<ul class="gn-submenu">
                <li class="mini_list_agile"><a href="'.$cncon->Duong_dan.'"><i class="fa fa-caret-right" aria-hidden="true"></i> '. $cncon->Ten .'</a></li>
      
              </ul>';
					}
				}
			}
			
			foreach($listchucnang as $cn)
			{
				$listcncon = $xlphanquyen->chucnang($_SESSION['ma'], $cn->Ma);
				
			?>
            	<li> <a href="<?php echo $cn->Duong_dan ?>"><i class="fa fa-cogs" aria-hidden="true"></i> <?php echo $cn->Ten ?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                
                <?php
				foreach($listcncon as $con)
				{
				?>
                    <ul class="gn-submenu">
                    <li class="mini_list_agile"><a href="<?php echo $con->Duong_dan ?>"><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $con->Ten ?></a></li>
          
                  </ul>
            <?php
				}
				echo '</li>';
			}
			?>
           <!-- <li> <a href="index.php?page=user"><i class="fa fa-cogs" aria-hidden="true"></i> Quản lý người dùng <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="gn-submenu">
                <li class="mini_list_agile"><a href="index.php?page=adduser"><i class="fa fa-caret-right" aria-hidden="true"></i> Thêm</a></li>
      
              </ul>
            </li>
            <li> <a href="index.php?page=stories"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Quản lý truyện <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="gn-submenu">
                <li class="mini_list_agile"><a href="index.php?page=addstory"><i class="fa fa-caret-right" aria-hidden="true"></i> Thêm</a></li>
                
              </ul>
            </li>
            <li> <a href="index.php?page=news"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Tin tức <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="gn-submenu">
                <li class="mini_list_agile"><a href="index.php?page=addnews"><i class="fa fa-caret-right" aria-hidden="true"></i> Thêm</a></li>
               
              </ul> 
            </li>
            <li> <a href="index.php?page=comments"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Quản lý bình luận<i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="gn-submenu">
                <li class="mini_list_agile"><a href="index.php?page=comments"><i class="fa fa-caret-right" aria-hidden="true"></i> Danh sách bình luận</a></li>
               
              </ul> 
            </li>
            
            <li><a href="table.html"> <i class="fa fa-table" aria-hidden="true"></i> Cấu hình hệ thống</a></li> -->
              
           
          </ul>
        </div>
        <!-- /gn-scroller -->
        <div id="ascrail2001" class="nicescroll-rails" style="width: 6px; z-index: 999; background: rgb(255, 255, 255); cursor: default; position: absolute; top: 0px; left: 277px; height: 805px; display: none;">
          <div style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(74, 156, 253); border: 0px; background-clip: padding-box; border-radius: 0px;"></div>
        </div>
        <div id="ascrail2001-hr" class="nicescroll-rails" style="height: 6px; z-index: 999; background: rgb(255, 255, 255); top: 799px; left: 0px; position: absolute; cursor: default; display: none;">
          <div style="position: relative; top: 0px; height: 6px; width: 0px; background-color: rgb(74, 156, 253); border: 0px; background-clip: padding-box; border-radius: 0px;"></div>
        </div>
      </nav>
    </li>
    <!-- //nav_agile_w3l -->
    <li class="second logo">
      <h1><a href="main-page.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo $_SESSION['ten']; ?> </a></h1>
    </li>
    <li class="second admin-pic">
      <ul class="top_dp_agile">
        <li class="dropdown profile_details_drop"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <div class="profile_img"> <span class="prfil-img"><img  height="50" src="<?php echo $_SESSION['avatar'] ?>" style="background-position:center center; background-size:cover; object-fit: cover; max-width:50"  /> </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
            <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
            <li> <a href="?page=thoat"><i class="fa fa-sign-out"></i> Logout</a> </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="second top_bell_nav">
      <ul class="top_dp_agile ">
        <li class="dropdown head-dpdn"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="badge blue">4</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="notification_header">
                <h3>Your Notifications</h3>
              </div>
            </li>
            <li><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a3.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>John Smith</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>1 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li class="odd"><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a1.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>Jasmin Leo</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>3 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a2.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>James Smith</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>2 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a4.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>James Smith</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>1 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li>
              <div class="notification_bottom"> <a href="#">See all Notifications</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="second top_bell_nav">
      <ul class="top_dp_agile ">
        <li class="dropdown head-dpdn"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span class="badge blue">3</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="notification_header">
                <h3>Your Messages</h3>
              </div>
            </li>
            <li><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a3.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>John Smith</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>3 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li class="odd"><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a1.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>Jasmin Leo</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>2 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li><a href="#">
              <div class="user_img"><img src="<?= TEMPLATE_PATH ?>images/a2.jpg" alt=""></div>
              <div class="notification_desc">
                <h6>James Smith</h6>
                <p>Lorem ipsum dolor</p>
                <p><span>1 hour ago</span></p>
              </div>
              <div class="clearfix"></div>
              </a></li>
            <li>
              <div class="notification_bottom"> <a href="#">See all Messages</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="second top_bell_nav">
      <ul class="top_dp_agile ">
        <li class="dropdown head-dpdn"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue">9</span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="notification_header">
                <h3>You have 4 Pending tasks</h3>
              </div>
            </li>
            <li><a href="#">
              <div class="task-info"> <span class="task-desc">Database update</span><span class="percentage">40%</span>
                <div class="clearfix"></div>
              </div>
              <div class="progress progress-striped active">
                <div class="bar yellow" style="width:40%;"></div>
              </div>
              </a></li>
            <li><a href="#">
              <div class="task-info"> <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
                <div class="clearfix"></div>
              </div>
              <div class="progress progress-striped active">
                <div class="bar green" style="width:90%;"></div>
              </div>
              </a></li>
            <li><a href="#">
              <div class="task-info"> <span class="task-desc">Mobile App</span><span class="percentage">33%</span>
                <div class="clearfix"></div>
              </div>
              <div class="progress progress-striped active">
                <div class="bar red" style="width: 33%;"></div>
              </div>
              </a></li>
            <li><a href="#">
              <div class="task-info"> <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
                <div class="clearfix"></div>
              </div>
              <div class="progress progress-striped active">
                <div class="bar  blue" style="width: 80%;"></div>
              </div>
              </a></li>
            <li>
              <div class="notification_bottom"> <a href="#">See all pending tasks</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="second w3l_search">
      <form action="#" method="post">
        <input type="search" name="search" placeholder="Search here..." required="">
        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </li>
    <li class="second full-screen">
      <section class="full-top">
        <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
      </section>
    </li>
  </ul>
  <!-- //nav --> 
  
</div>
