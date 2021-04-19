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


<?php

        
if(isset($_POST['submit1']))
{



$tutar=$_POST['tutar'];
$islem=$_POST['islem'];
$tur=$_POST['tur'];
$tur1=$_POST['tur1'];
$sontur=-$tutar;

    
    
$sql ="INSERT INTO web(tutar,islem,tur) VALUES( :tutar, :islem,:tur)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':tutar', $sontur, PDO::PARAM_STR);
$query-> bindParam(':islem', $islem, PDO::PARAM_STR);
$query-> bindParam(':tur', $tur, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$sql ="INSERT INTO web(tutar,islem,tur) VALUES( :tutar, :islem,:tur)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':tutar', $tutar, PDO::PARAM_STR);
$query-> bindParam(':islem', $islem, PDO::PARAM_STR);
$query-> bindParam(':tur', $tur1, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script type='text/javascript'> document.location = 'hesap.php'; </script>";
}
else 
{
$error="Hata";
}


}
else 
{
$error="Hata";
}

}
?>


<!doctype html>


<html class="no-js" lang=""> 
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
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
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
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Hesap İşlemleri</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Hesap İşlemleri</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
    

                    
                    <div class="col-lg-6">
                        <div class="card">
                   <strong class="card-title">Para Ekle</strong>
                            <div class="card-body card-block">
                                <form method="post"  action="e.php"enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Para Miktarı</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
                                    </div>
                                  
                                 
                                
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Para Birimi</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="islem" id="select" class="form-control">
                                                <option value="0">Seç</option>
                                                <option value="TL">TL</option>
                                                <option value="EUR">EUR</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                
                              
                               
                             
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Hesap Türü</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="tur1" value="Nakit" class="form-check-input">Nakit
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="tur1" value="Kart" class="form-check-input"> Kart
                                                    </label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                               	<button name="submit12" type="submit" class="btn btn-primary btn-sm">
                                     
                                    <i class="fa fa-dot-circle-o"></i> Ekle
                                </button>
                                
                                   
                                </form>
                            </div>
                           
                        </div>
                     
                    </div>
				
      <div class="col-lg-6">
                        <div class="card">
           <strong class="card-title">Transfer</strong>
                            <div class="card-body card-block">
                                <form method="post" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Para Miktarı</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
                                    </div>
                                  
                                 
                                
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Para Birimi</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="islem" id="select" class="form-control">
                                                <option value="0">Seç</option>
                                                <option value="TL">TL</option>
                                                <option value="EUR">EUR</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                
                              
                               
                             
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Gönderecek Hesap</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio3" class="form-check-label ">
                                                        <input type="radio" id="radio3" name="tur" value="Nakit" class="form-check-input">Nakit
                                                    </label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label for="radio4" class="form-check-label ">
                                                        <input type="radio" id="radio4" name="tur" value="Kart" class="form-check-input"> Kart
                                                    </label>
                                                </div>
                                                
                                            </div>
											
                                        </div>

                                    </div>
									
									     
                             
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Alacak Hesap</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio5" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="tur1" value="Nakit" class="form-check-input">Nakit
                                                    </label>
                                              
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label for="radio6" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="tur1" value="Kart" class="form-check-input"> Kart
                                                    </label>
                                                </div>
                                                
                                            </div>
											
                                        </div>

                                    </div>
                               	<button name="submit1" type="submit" class="btn btn-primary btn-sm">
                                     
                                    <i class="fa fa-dot-circle-o"></i>Transfer
                                </button>
                                
                                   
                                </form>
                            </div>
                           
                        </div>
                     
                    </div>
           	<br><br>	<br><br>
					<br>	<br><br>
					<br>	<br><br>
			
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Nakit Bilgisi</strong>
						<br>
											<small>Bilgiler </small>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                     
                                            <th>ID</th>
                                            <th>Toplam Bakiye</th>
                                            <th>Para Birimi</th>
                                            <th>Transfer</th>
                                            <th>Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM web WHERE islem='TL' AND tur='Nakit'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>         	
									<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM web WHERE islem='EUR' AND tur='Nakit'") as $row) {
$row['Sum(tutar)'];
}
$bakiyea=$row['Sum(tutar)']
?>         
                                        <tr>
                                            <td class="serial">1.</td>
                                           
                                            <td> #1 </td>
                                            <td>  <span class="name"><?php echo $bakiye;?></span> </td>
                                            <td> <span class="product">TRY</span> </td>
                                            <td>    <span class="badge badge-complete">Transfer</span></td>
                                            <td>
                                                <span class="badge badge-complete">Düzenle</span>
                                            </td>
                                        </tr>
										 <tr>
                                            <td class="serial">2.</td>
                                           
                                            <td> #2 </td>
                                            <td>  <span class="name"><?php echo $bakiyea;?></span> </td>
                                            <td> <span class="product">EUR</span> </td>
                                            <td>    <span class="badge badge-complete">Transfer</span></td>
                                            <td>
                                                <span class="badge badge-complete">Düzenle</span>
                                            </td>
                                        </tr>
                                      
                                 
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                  

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kart Bilgisi</strong>
								<br>
								<small> Bilgiler </small>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                   <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                     
                                            <th>ID</th>
                                            <th>Toplam Bakiye</th>
                                            <th>Para Birimi</th>
                                            <th>Transfer</th>
                                            <th>Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM web WHERE islem='TL' AND tur='Kart'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>         	
									<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM web WHERE islem='EUR' AND tur='Kart'") as $row) {
$row['Sum(tutar)'];
}
$bakiyea=$row['Sum(tutar)']
?>         
                                        <tr>
                                            <td class="serial">1.</td>
                                           
                                            <td> #1 </td>
                                            <td>  <span class="name"><?php echo $bakiye;?></span> </td>
                                            <td> <span class="product">TRY</span> </td>
                                            <td>    <span class="badge badge-complete">Transfer</span></td>
                                            <td>
                                                <span class="badge badge-complete">Düzenle</span>
                                            </td>
                                        </tr>
										 <tr>
                                            <td class="serial">2.</td>
                                           
                                            <td> #2 </td>
                                            <td>  <span class="name"><?php echo $bakiyea;?></span> </td>
                                            <td> <span class="product">EUR</span> </td>
                                            <td>    <span class="badge badge-complete">Transfer</span></td>
                                            <td>
                                                <span class="badge badge-complete">Düzenle</span>
                                            </td>
                                        </tr>
                                      
                                 
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
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


</body>
</html>