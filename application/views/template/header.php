<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/material-dashboard/assets/img/apple-icon.png');?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/material-dashboard/assets/img/favicon.png');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $companyname?> - Aplikasi Koperasi Simpan Pinjam
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="<?= base_url('assets/material-dashboard/assets/css/font-awesome.min.css')?>"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/> -->
  <link rel="stylesheet" href="<?= base_url('assets/material-dashboard/assets/css/googlefonts.css')?>"/>
  <!-- CSS Files -->
  <link href="<?= base_url($_SESSION['colors']['CssPath']);?>" rel="stylesheet" />
  <link href="<?= base_url('assets/material-dashboard/assets/css/dropzone.css');?>" rel="stylesheet" />
  <link href="<?= base_url('assets/material-dashboard/assets/css/customglobal.css');?>" rel="stylesheet" />
  <!-- <link href="<?= base_url('assets/material-dashboard/assets/css/test.css');?>" rel="stylesheet" /> -->
  <link href="<?= base_url('assets/material-dashboard/assets/css/jasny-bootstrap.css');?>" rel="stylesheet" />
  <!-- <link href="<?= base_url('assets/material-dashboard/assets/css/jquery.dataTables.min.css');?>" rel="stylesheet" /> -->
  <link href="<?= base_url('assets/material-dashboard/assets/css/animate.css');?>" rel="stylesheet" />
  <link href="<?= base_url($_SESSION['colors']['CssCustomPath']);?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url('assets/material-dashboard/assets/demo/demo.css');?>" rel="stylesheet" />
  <script src="<?= base_url('assets/material-dashboard/assets/js/core/jquery.min.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/bootstrap-notify.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/bootbox.min.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/core/popper.min.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/core/bootstrap-material-design.min.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!-- Plugin for the momentJs  -->
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/moment.min.js');?>"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/sweetalert2.js');?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/jquery.validate.min.js');?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/jquery.bootstrap-wizard.js');?>"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/bootstrap-selectpicker.js');?>"></script>
  <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/dropzone.js');?>"></script>
  <!-- <script src="<?= base_url('assets/material-dashboard/assets/js/plugins/forms-dropzone.js');?>"></script> -->
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="black" data-image="<?= base_url('assets/material-dashboard//assets/img/sidebar-1.jpg');?>">

      <div class="logo">
		    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="af8bc3a6-63f8-c37d-ec22-0c6794f3a10c">
        <div class="user">
          <div class="photo">
            <img src="<?= base_url($_SESSION['userprofile']['PhotoPath'].$_SESSION['userprofile']['PhotoName']);?>">
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?= $_SESSION['userdata']['Username']?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('profile')?>">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> <?= lang('ui_profile')?> </span>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="../examples/dashboard.html">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#setupPage" aria-expanded="false">
              <i class="material-icons">description</i>
              <p><?= lang('ui_setting')?>
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="setupPage" style="">
              <ul class="nav">
              
              <?php 
              foreach($setupmenu as $master) {
                if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$master->FormName, "Read")){
              ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url($master->IndexRoute);?>">
                    <span class="sidebar-mini"><?= get_first_letter(lang($master->Resource))?> </span>
                    <span class="sidebar-normal"> <?= lang($master->Resource)?> </span>
                  </a>
                </li>
              <?php 
                }
              }
              ?>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#generalMenu" aria-expanded="false">
              <i class="material-icons">description</i>
              <p> <?= lang('ui_general')?>
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="generalMenu" style="">
              <ul class="nav">
              
              <?php 
              foreach($generalmenu as $master) {
                if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$master->FormName, "Read")){
              ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url($master->IndexRoute);?>">
                    <span class="sidebar-mini"><?= get_first_letter(lang($master->Resource))?> </span>
                    <span class="sidebar-normal"> <?= lang($master->Resource)?> </span>
                  </a>
                </li>
              <?php 
                }
              }
              ?>
              </ul>
            </div>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
              <i class="material-icons">description</i>
              <p> Master
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples" style="">
              <ul class="nav">
              
              <?php 
              foreach($mastermenu as $master) {
                if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$master->FormName, "Read")){
              ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url($master->IndexRoute);?>">
                    <span class="sidebar-mini"><?= get_first_letter(lang($master->Resource))?> </span>
                    <span class="sidebar-normal"> <?= lang($master->Resource)?> </span>
                  </a>
                </li>
              <?php 
                }
              }
              ?>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#transactionMenu" aria-expanded="false">
              <i class="material-icons">description</i>
              <p> <?= lang('ui_transaction')?>
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="transactionMenu" style="">
              <ul class="nav">
              
              <?php 
              foreach($transactionmenu as $master) {
                if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],$master->FormName, "Read")){
              ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url($master->IndexRoute);?>">
                    <span class="sidebar-mini"><?= get_first_letter(lang($master->Resource))?> </span>
                    <span class="sidebar-normal"> <?= lang($master->Resource)?> </span>
                  </a>
                </li>
              <?php 
                }
              }
              ?>
              </ul>
            </div>
          </li>
          <?php 
            if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],"r_reports", "Read"))  
            {
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url("report");?>">
              <i class="material-icons">description</i>
              <p> <?= lang('ui_report')?> </p>
            </a>
          </li>
          <?php 
            }
          ?>
          <?php 
            if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],"m_users", "Read"))  
            {
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url("muser");?>">
              <i class="material-icons">face</i>
              <p> <?= lang('ui_user')?> </p>
            </a>
          </li>
          <?php 
            }
          ?>
          <?php 
            if(is_permitted($_SESSION['userdata']['M_Groupuser_Id'],"m_groupusers", "Read"))  
            {
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url("mgroupuser");?>">
              <i class="material-icons">face</i>
              <p> <?= lang('ui_groupuser')?> </p>
            </a>
          </li>
          <?php 
            }
          ?>
          
        </ul>
        <!-- <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 551px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 240px;"></div></div> -->
    
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
			      <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              <div class="ripple-container"></div></button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= $companyname ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?= base_url('changePassword')?>"><?= lang('ui_changepassword')?></a>
                  <a class="dropdown-item" href="<?= base_url('settings')?>"><?= lang('ui_setting')?></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('login/dologout')?>"><?= lang('ui_logout')?></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    