<?php
	require_once("../pages/lib/koneksi2.php");

	if(isset($_GET['ed']) && $_GET['ed'] == true)
	{
		$sql = "SELECT * FROM master_user WHERE id_user = $_GET[id]";
		$hasil_edit = mysqli_query($k,$sql);
		$b_edit = mysqli_fetch_array($hasil_edit);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SIMPLE POS</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>Selamat datang <?php echo $_SESSION['nama_user']; ?> <i class="fa fa-caret-down"></i>
                    </a>
					<ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul> <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
			</ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                       
                        <li>
                            <a href="master_home.html"><i class="fa fa-bar-chart-o fa-fw"></i>Master</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                       
						
                        <li>
                            <a href="transaction_home.html"><i class="fa fa-wrench fa-fw"></i>Transaction</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="report_home.html"><i class="fa fa-sitemap fa-fw"></i>Report</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                      
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Master User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Master User Edit
                        </div>
                        <div class="panel-body">
						<div class="row">
                            <div class="col-lg-6">
								<?php
									if(isset($_GET['ed']) && $_GET['ed'] == true){
									?>
                                    <form role="form" action="masteruser_edit_proses.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
										<div class="form-group">
                                            <label>Real Name</label>
                                            <input type="text" name="realname" class="form-control" value="<?php echo $b_edit['nama_user']?>";/>
										</div>
										<div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $b_edit['nama_user']?>"/>
									   </div>
									   <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="pass" class="form-control" value="<?php echo $b_edit['password']?>"/>
									   </div>
										
										<div class="form-group">
										<label>Sex</label><br>
										<input type="radio" name="jk" value="L" <?php if($b_edit['jk_user'] == "L") echo "checked"; ?>/> Male
										<input type="radio" name="jk" value="P" <?php if($b_edit['jk_user'] == "P") echo "checked"; ?>/> Female
										</div>
										
										<div class="form-group">
                                            <label>Address</label>
											<!--<textarea class="form-control" rows="3"></textarea>-->
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $b_edit['alamat_user']?>"/>
											</div>
										<div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="telepon" class="form-control" value="<?php echo $b_edit['alamat_user']?>"/>
											</div>
										<div class="form-group">
                                            <label>Job Title</label>
                                            <input type="text" name="jabatan" class="form-control" value="<?php echo $b_edit['jabatan_user']?>"/>
											</div>
											
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="mail" class="form-control" value="<?php echo $b_edit['email']?>"/>
											</div>
										
                                        <button type="submit" name="edit" value="Save" class="btn btn-default"/>Save</button>
										<button type="submit" class="btn btn-default">Edit</a></button>
                                        <button type="reset" value="Reset"class="btn btn-default">Reset</a></button>
										<button type="submit" class="btn btn-default"><a href='masteruser_delete_proses.php?delbar=true&id=<?php echo $b['id_user']; ?>'>Delete</a></td></button>
										<button type="submit" class="btn btn-default"><a href="masteruser_home.php">Exit</a></button>
										
										</div>
										<div class="col-lg-6">
											<div class="form-group">											
												<img src="<?php echo $b_edit['foto_user']; ?>" />
											</div>
											<div class="form-group">
												<input type = "file" name="foto" />
											</div>
										</div>
                                    </form>
									<?php } ?>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
