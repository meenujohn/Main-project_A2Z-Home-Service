<?php
session_start();
$login=$_SESSION['login'];
$type=$_SESSION['type'];
$usr_name=$_SESSION['name'];
$logid=$_SESSION['loginid'];
if($login)
{
    ?>
<?php
include 'co.php';
  $se=" select * from creg where logid ='$logid' ";
$re=mysqli_query($con,$se);
$row=mysqli_fetch_array($re);
 $lid=$row['customid'];
 $sqll="SELECT MAX(id) AS max_val from `booking_approval` where customid='$lid'";
        $runquery1=mysqli_query($con,$sqll);
        $row = mysqli_fetch_array($runquery1);
        $id= $row["max_val"];
$sel=" select * from  booking_approval,spreg,district where spreg.disid=district.disid AND booking_approval.spid=spreg.spid AND booking_approval.id ='$id'";
$res=mysqli_query($con,$sel);
 ?>
<?php 
include 'co.php';



   $ses= "select * from cart,addproduct where cart.itemid = addproduct.itemid and logid = '$logid' and cart.status='unpaid'";
    $ree=mysqli_query($con,$ses);
    $rowcount=mysqli_num_rows($ree);
    $i=1;
    
  ?> 

<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Meta -->
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
     <!-- Favicon icon -->
     <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
     <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
     <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Google font-->
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

     <!-- iconfont -->
     <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

     <!-- simple line icon -->
     <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">

     <!-- Required Fremwork -->
     <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">

     <!-- Weather css -->
     <link href="assets/css/svg-weather.css" rel="stylesheet">

     <!-- Echart js -->
     <script src="assets/plugins/charts/echarts/js/echarts-all.js"></script>

     <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="assets/css/main.css">

     <!-- Responsive.css-->
     <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

     <!--color css-->
     <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color"/>

 </head>
 <body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
    <div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
</div> -->
<!-- Navbar-->
<header class="main-header-top hidden-print">
    
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <!-- Navbar Right Menu-->
        
            <ul class="top-nav">
                <!--Notification Menu-->
                    
               <li><a href="viewcart.php"><i class="fa fa-shopping-cart" style="width: 40px; height: 40px;"></i><?php echo $rowcount."items ";
               ?></a></li>
                
                    <!-- User Menu-->
                   <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="assets/images/avatar-1.png" style="width:40px;" alt="User Image"></span>
                                <span> <?php echo " $usr_name "; ?> <i class=" icofont icofont-simple-down"></i></span>

                            </a>
                            <ul class="dropdown-menu settings-menu">
                                
                                <li><a href="profile.php"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="bookhistory.php"><i class="icon-envelope-open"></i> My Booking History</a></li>
                                 <li><a href="order.php"><i class="icon-briefcase"></i> My order History</a></li>
                                <li><a href="mesg.php"><i class="icon-user"></i> notifications</a></li>
                                
                                
                                <li><a href="logout.php"><i class="icon-logout"></i> Logout</a></li>

                            </ul>
                        </li>
                    </ul>

                    <!-- search -->
                    <div id="morphsearch" class="morphsearch">
                        <form class="morphsearch-form">

                            <input class="morphsearch-input" type="search" placeholder="Search..."/>

                            <button class="morphsearch-submit" type="submit">Search</button>

                        </form>
                        <div class="morphsearch-content">
                            <div class="dummy-column">
                                <h2>People</h2>
                                <a class="dummy-media-object" href="#!">
                                    <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
                                    <h3>Sara Soueidan</h3>
                                </a>

                                <a class="dummy-media-object" href="#!">
                                    <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona"/>
                                    <h3>Shaun Dona</h3>
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Popular</h2>
                                <a class="dummy-media-object" href="#!">
                                    <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect"/>
                                    <h3>Page Preloading Effect</h3>
                                </a>

                                <a class="dummy-media-object" href="#!">
                                    <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow"/>
                                    <h3>Draggable Dual-View Slideshow</h3>
                                </a>
                            </div>
                            <div class="dummy-column">
                                <h2>Recent</h2>
                                <a class="dummy-media-object" href="#!">
                                    <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration"/>
                                    <h3>Tooltip Styles Inspiration</h3>
                                </a>
                                <a class="dummy-media-object" href="#!">
                                    <img src="assets/images/avatar-1.png" alt="NotificationStyles"/>
                                    <h3>Notification Styles Inspiration</h3>
                                </a>
                            </div>
                        </div><!-- /morphsearch-content -->
                        <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                    </div>
                    <!-- search end -->
                </div>
            </nav>
        </header>
        <!-- Side-Nav-->
        <aside class="main-sidebar hidden-print " >
            <section class="sidebar" id="sidebar-scroll">
                
                
                <!-- sidebar profile Menu-->
                
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                    <div class="user-panel">
                <div class="f-left image"><img src="assets/images/avatar-1.png" alt="User Image" class="img-circle"></div>
                <div class="f-left info">
                    <p><span> <?php echo " $usr_name "; ?> </span></p>
                    <p class="designation"><span> <?php echo " $type "; ?></span></p>
                </div>
            </div>
            <!-- sidebar profile Menu-->
            <ul class="nav sidebar-menu extra-profile-list">
                <li>
                 <a class="waves-effect waves-dark" href="profile.php">
                     <i class="icon-user"></i>
                     <span class="menu-text">View Profile</span></a>
                     <span class="selected"></span>
                 </a>
                 </li>

                <li>
                    <a class="waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-settings"></i>
                        <span class="menu-text">Settings</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="mesg.php">
                        <i class="icon-settings"></i>
                        <span class="menu-text">Notifications</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
                <ul class="sidebar-menu">
                    <li class="nav-level"></li>
                    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> Service</span><i class="icon-arrow-down"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="viewservice.php"><i class="icon-arrow-right"></i>View Service</a></li>
                            <li><a class="waves-effect waves-dark" href="bookhistory.php"><i class="icon-arrow-right"></i> View Booking history</a></li>
                            <li><a class="waves-effect waves-dark" href="feedback.php"><i class="icon-arrow-right"></i> Add feedback</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span> Shopping</span><i class="icon-arrow-down"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="viewproducts.php"><i class="icon-arrow-right"></i>View Products</a></li>
                            
                </ul>
            </section>
        </aside>
    <!-- Sidebar chat start -->
    <div id="sidebar" class="p-fixed header-users showChat">
        <div class="had-container">
            <div class="card card_main header-users-main">
                <div class="card-content user-box">

                    <div class="md-group-add-on p-20">
                                 <span class="md-add-on">
                                    <i class="icofont icofont-search-alt-2 chat-search"></i>
                                 </span>
                        <div class="md-input-wrapper">
                            <input type="text" class="md-form-control"  name="username" id="search-friends">
                            <label>Search</label>
                        </div>

                    </div>
                    <div class="media friendlist-main">

                        <h6>Friend List</h6>

                    </div>
                    <div class="main-friend-list">
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice"  data-toggle="tooltip" data-placement="left" title="Alice">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Alice</div>
                                <span>1 hour ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="7" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                                <div class="live-status bg-danger"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Michael Scofield</div>
                                <span>3 hours ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="5" data-status="online" data-username="Irina Shayk" data-toggle="tooltip" data-placement="left" title="Irina Shayk">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-4.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Irina Shayk</div>
                                <span>1 day ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="6" data-status="offline" data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left" title="Sara Tancredi">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-5.png" alt="Generic placeholder image">
                                <div class="live-status bg-danger"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Sara Tancredi</div>
                                <span>2 days ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Alice</div>
                                <span>1 hour ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Alice</div>
                                <span>1 hour ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip"  data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice"  data-toggle="tooltip" data-placement="left" title="Alice">
                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Alice</div>
                                <span>1 hour ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                        <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                            <a class="media-left" href="#!">
                                <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                <div class="live-status bg-success"></div>
                            </a>
                            <div class="media-body">
                                <div class="friend-header">Josephin Doe</div>
                                <span>20min ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="showChat_inner">
        <div class="media chat-inner-header">
            <a class="back_chatBox">
                <i class="icofont icofont-rounded-left"></i> Josephin Doe
            </a>
        </div>
        <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
                <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
                <div class="">
                    <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                    <p class="chat-time">8:20 a.m.</p>
                </div>
            </div>
        </div>
        <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
                <div class="">
                    <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                    <p class="chat-time">8:20 a.m.</p>
                </div>
            </div>
            <div class="media-right photo-table">
                <a href="#!">
                    <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                </a>
            </div>
        </div>
        <div class="media chat-reply-box">
            <div class="md-input-wrapper">
                <input type="text" class="md-form-control" id="inputEmail" name="inputEmail" >
                <label>Share your thoughts</label>
                 <span class="highlight"></span>
                 <span class="bar"></span>  <button type="button" class="chat-send waves-effect waves-light">
                     <i class="icofont icofont-location-arrow f-20 "></i>
                 </button>

            </div>

        </div>
    </div>
    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
                    
                    
                </div>
            </div>
            <!-- Header end -->
            <div class="row">
           

                <!-- start col-lg-9 -->
                <div class="col-xl-9 col-lg-8">
                    <div class="col-xl-9 col-lg-8">
                    <div class="tab-header">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                            
                            
                            
                        </ul>
                    </div>
                    <!-- Nav tabs -->
                   
                    <!-- end of tab-header -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <div class="card">
                                
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                    <table class="table m-0">
                    
                                                                   
                    <tbody>
                    <?php
                    while($row=mysqli_fetch_array($res))
  
                                                                       {
                                     

                ?>
             <tr>
                                                                   
            <td> <b>Name:</b>
                                                                        <?php 
                                                                            echo $row['name'];
                                                                           ?></td>
        </tr>
    <tr>
                                                                   
<td><b>Phoneno:</b>
                                                                        <?php 
                                                                            echo $row['phoneno'];
                                                                           ?></td>
    </tr>
    <tr>
                                                                   
<td><b>Email:</b>
                                                                        <?php 
                                                                            echo $row['email'];
                                                                           ?></td>
</tr>
 <tr>
                                                                   


  </tr>
                                                                
                                                         
                                                                
        
        </tbody>
        </table>
        
              <td>
  <form action="ok.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['spid']; ?>"/>
    
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="OK">
  </form>
  </td>
            </div>
                                                        <!-- end of table col-lg-6 -->

                                                        
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>
                                    <!-- end of view-info -->

                                    <div class="edit-info">
                                        <div class="row">
                                           
                                                                <?php
        }
        ?>
                                                  
                                            <!-- end of col-lg-12 -->
                                        </form>
                                        </div>
                                        <!-- end of row -->

                                    </div>
                                    <!-- end of view-info -->
                                </div>
                                <!-- end of card-block -->
                            </div>
                            <!-- end of card-->

                         

                         
                        </div>
                        <!-- end of tab-pane -->
                        <!-- end of about us tab-pane -->

          


           

                        <!-- start memeber ship tab pane -->


                        <!-- end of memebership tab pane -->

                    </div>
                    <!-- end of main tab content -->
                </div>
            </div>

        </div>
        <!-- Container-fluid ends -->
    </div>
</div>





<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->


<!-- Required Jqurey -->
<script src="assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="assets/plugins/Waves/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- pie chart.js -->
<script type="text/javascript" src="assets/plugins/bower-jquery-easyPieChart/dist/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="assets/pages/counter.js"></script>

<!-- Date picker.js -->
<script type="text/javascript" src="assets/plugins/moment/moment.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- custom js -->
<script type="text/javascript" src="assets/js/main.min.js"></script>
<script type="text/javascript" src="assets/pages/profile.js"></script>
<script type="text/javascript" src="assets/pages/elements.js"></script>
<script type="text/javascript" src="assets/js/menu.min.js"></script>

</body>
</html>
<?php
include 'co.php';

    if(isset($_POST['submit']))
    {
      $a=$_POST['phone'];
      //$b=$_POST['dis'];
       $c=$_POST['city'];
        $d=$_POST['pin'];
      

      

      
      
  
         $sql="UPDATE spreg SET phoneno='$a',city='$c',pincode='$d' WHERE logid ='$logid'";
    
      
      $ch=mysqli_query($con,$sql);
              
       if($ch)
          
          {?>
            <script>
             alert("updated successfully");
             </script>
             <?php
          }
        else
          {
            //echo "<script>alert('error')</script>";
          }
      }
    
        mysqli_close($con);
  ?>
<?php
}
else
header('location:/meenuminipro/login');
?>