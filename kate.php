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

        
if(isset($_POST['submit61']))
{



$urun=$_POST['urun'];
$tutar=$_POST['tutar'];
$magaza=$_POST['magaza'];
$tur=$_POST['tur'];
$sontur=-$tutar;
$islem=$_POST['islem'];
    
    
$sql ="INSERT INTO hareketler(urun,tutar,magaza,tur) VALUES( :urun, :tutar,:magaza,:tur)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':urun', $urun, PDO::PARAM_STR);
$query-> bindParam(':tutar', $tutar, PDO::PARAM_STR);
$query-> bindParam(':magaza', $magaza, PDO::PARAM_STR);
$query-> bindParam(':tur', $tur, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$sql ="INSERT INTO web(tutar,islem,tur) VALUES( :tutar, :islem,:tur)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':tutar', $sontur, PDO::PARAM_STR);
$query-> bindParam(':islem', $islem, PDO::PARAM_STR);
$query-> bindParam(':tur', $tur, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script type='text/javascript'> document.location = 'kate.php'; </script>";
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


<style>

@import url(https://fonts.googleapis.com/css?family=Cantarell:400,400italic,700italic,700);
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
* {
  padding:0;
  margin:0;
  position:relative;
  box-sizing:border-box;
  -webkit-font-smoothing: subpixel-antialiased !important; 
  -webkit-backface-visibility: hidden; 
}

p {
  margin-bottom:1em;
}

a.modala-open {
  display:block;
  padding:20px;
  color:#424242;
  font-weight:bold;
  margin:50px auto;
  width:280px;
  background:#e0e0e0;
  border-radius:2px;
  text-align:center;
  text-decoration:none;
}
.modala {
  background:rgba(0,0,0,0.7);
  position:fixed;
  width:100%;
  height:100%;
  top:0px;
  left:0px;
  bottom:0px;
  transition:all .5s ease-in-out;
  opacity:0;
  z-index:-1;
}
.modala:target {
  opacity:1;
  transition:all .5s ease-in-out;
  z-index:+1;
}
.modala-content {
  position:fixed;
  top:50%;
  left:50%;
  width:500px;
  background:#fff;
  border-radius:4px;
  transform:translate(-50%, -200%);
  transition:all .5s ease-in-out;
  perspective: 1000;
  outline:1px solid transparent;
  opacity:0;
}
.modala:target .modala-content {
  transform:translate(-50%, -50%);
  transition:all .5s ease-in-out;
  transition-delay:.5s;
  z-index:9999;
  opacity:1;
}
.modala-close {
  float:right;
  text-decoration:none;
  padding:22px 22px;
  color:#424242;
  font-weight:800;
  transition:all .5s ease-in-out;
  z-index:+1;
  background:rgba(0,0,0,0.1);
  text-align:center;
  border-radius:0 4px 0 0;
}
.modala-close:hover {
  color:#fff;
  background:rgba(0,0,0,0.5);
}
.modala-content h3 {
  padding:20px;
  display:block;
  text-align:center;
  border-bottom:1px solid #e0e0e0;
  text-transform:uppercase;
  background:rgba(2,162,239,1);
  color:#fff;
  border-radius:4px 4px 0 0;
}
.modala-area {
  padding:20px;
}

.modala-area input[type="radio"] {
  display:none;
}
.modala-area label {
  float:left;
  display:block;
  padding:10px 20px;
  font-weight:700;
  cursor:pointer;
  z-index:+2;
  background:rgba(0,0,0,.3);
  color:#fff;
  transition:all .5s ease-in-out;
}
.modala-area input[type="radio"]:checked + label {
  background:#fff;
  color:#424242;
}
.tabk-list {
  display:block;
  padding:0;
  margin:0;
  list-style-type:none;
  width:80%;
  overflow:hidden;
  height:150px;
}
.tabk-list:before {
  content:"";
  display:block;
  height:0;
  clear:both;
}
.modala-tabk {
  display:inline-block;
  width:100%;
  padding-top:20px;
  transform:translateX(-150%);
  transition:all 300ms cubic-bezier(0, 0, .40, 1);
  opacity:0;
  top:0px;
  position:absolute;
  height:150px;
  perspective:1000;
}
#opentabk1:checked ~ .tabk-list .tabk1 {
  transform:translateX(0%);
  opacity:1;
}
#opentabk2:checked ~ .tabk-list .tabk2 {
  transform:translateX(0%);
  opacity:1;
}
#opentabk3:checked ~ .tabk-list .tabk3 {
  transform:translateX(0%);
  opacity:1;
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
		
		
         

       
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
	<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Saglik'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>         	

  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib">	<a  href="#modala"><i class="ti-heart text-danger border-danger"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Sağlık</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
						<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Market'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>  
  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><a  href="#modalak"><i class="ti-shopping-cart text-primary border-primary"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Market</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
											<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Ulasim'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>  
  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><a  href="#modalak1"><i class="ti-car"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Ulaşım</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
											<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Egitim'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>  
  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><a  href="#modalak2"><i class="ti-money ti-layout-grid2 text-warning border-warning"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Eğitim</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
											<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Vergi'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>  
  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><a  href="#modalak3"><i class="ti-money text-success border-success"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Vergi</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
											<?php 

foreach($dbh->query("SELECT Sum(tutar) FROM hareketler WHERE urun='Diger'") as $row) {
$row['Sum(tutar)'];
}
$bakiye=$row['Sum(tutar)']
?>  
  <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><a  href="#modalak4"><i class="ti-wallet text-success border-success"></i></a></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Diğer</div>
                                        <div class="stat-digit"><?php echo $bakiye;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				
				
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

       

    </div><!-- /#right-panel -->

    <!-- Right Panel -->









<div class="modala" id="modala">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"   enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Saglik"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
  
                                             
                                    
                                     
                                            <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                          <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>
                                  <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
                                         
	  
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	



<div class="modala" id="modalak">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"   enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Market"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
   
	         <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                             <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>   <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	



<div class="modala" id="modalak1">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"   enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Ulasim"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
          <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                       <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>   <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
	  
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	

<div class="modala" id="modalak2">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"  enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Egitim"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
          <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                               <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>   <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
	  
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	


<div class="modala" id="modalak3">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"   enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Vergi"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
   
	         <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                                <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>   <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	


<div class="modala" id="modalak4">
  <div class="modala-content">
    <a href="#" class="modala-close" title="Close modala">X</a>
    <h3> Gider Ekle</h3>
    <div class="modala-area">
 <form method="post"   enctype="multipart/form-data" name="regform" onSubmit="return validate();">
   
   
    <input type="hidden" name="urun" value="Diger"> 
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="tutar" placeholder="Tutar" class="form-control"></div>
  </div>   
  <div class="row form-group">
 <div class="col-12 col-md-9"><input type="text" id="text-input" name="magaza" placeholder="Mağaza/İsim/Bilgi" class="form-control"></div>
  </div>
   
	         <select name="tur" id="select" class="form-control">
                                                <option value="0">Hesap Seç</option>
                                                <option value="Kart">Kart</option>
                                                 <option value="Nakit">Nakit</option>
                                            
                                            </select>
                                      <br>
									   <select name="islem" id="select" class="form-control">
                                                <option value="0">Birim Seç</option>
                                                <option value="Tl">TL</option>
                                                 <option value="EUR">EUR</option>
                                            
                                            </select>
                                      <br>
	  		<button name="submit61" type="submit" class="btn btn-primary btn-sm">Ekle</button>
	  
	  </form>
    </div>
  </div>
</div>	




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