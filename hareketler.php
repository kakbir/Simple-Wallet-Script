<?php

// DB credentials.
define('DB_HOST1','localhost');
define('DB_USER1','root');
define('DB_PASS1','');
define('DB_NAME1','web');
// Establish database connection.
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST1.";dbname=".DB_NAME1,DB_USER1, DB_PASS1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "));
}
catch (PDOException $e )
{
exit("Error: " . $e->getMessage());
}

?>
<!doctype html>

<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Para Yönetimi</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Ana Sayfa </a>
                    </li>
                    <li class="menu-title">Menü</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="hesap.php" class="dropdown-toggle" > <i class="menu-icon fa fa-cogs"></i>Hesap İşlemleri</a>
                        
                    <li class="menu-item-has-children dropdown">
                        <a href="hareketler.php" class="dropdown-toggle" > <i class="menu-icon fa fa-table"></i>Hareketler</a>
                       
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="kate.php" class="dropdown-toggle" > <i class="menu-icon fa fa-th"></i>Kategoriler</a>
                       
                    </li>
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" > <i class="menu-icon fa fa-th"></i>Kullanıcı İşlemleri</a>
                       
                    </li>
          
                             </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                     

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Profil
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Profil</a>

                

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Çıkış</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
		
		
         

       
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                       <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Hareketler</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
										  <th>#</th>
                                            <th>Mağaza</th>
                                            <th>Tür</th>
                                            <th>Tutar</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php

										$sql = "SELECT * from  hareketler ORDER BY id DESC   ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
									
									
                                        <tr>
										 <td><?php echo ($result->id);?></td>
                                            <td><?php echo ($result->magaza);?></td>
                                            <td><?php echo ($result->urun);?></td>
                                            <td><?php echo ($result->tutar);?>₺</td>
                                            <td><?php echo ($result->tarih);?></td>
                                        </tr>
                    
                                        <?php $cnt=$cnt+1; }} ?> 
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

       

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
</body>
</html>