<?php
$filep = realpath(dirname(__FILE__));
include $filep."/../lib/Session.php";
Session::init();
include $filep."/../lib/Database.php";
include $filep."/../lib/Format.php";

?>
<?php
spl_autoload_register(function($class){
	include "classes/".$class.".php";
	});
	$bd = new Brand();
	$db = new Database();
	$fm = new Format();
	$cat = new Category();
	$cart = new Cart();
	$pd = new Product();
	$cust = new Customer();
	

?>
<!DOCTYPE HTML>
<head>
<!--
<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  
<link rel="icon" href="launcher.png" type ="image/x-icon">
<meta name="theme-color" content="tomato" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


<style>
@import url('https://fonts.maateen.me/apona-lohit/font.css');
</style>
<style>
@import url('https://fonts.maateen.me/adorsho-lipi/font.css');
</style>
<style>
@import url('https://fonts.maateen.me/charu-chandan-3d/font.css');
</style>
<style>
@import url('https://fonts.maateen.me/charu-chandan-hard-stroke/font.css');
</style>
<style>
@import url('https://fonts.maateen.me/charukola-ultra-light/font.css');
</style>
<style>
@import url('https://fonts.maateen.me/kalpurush/font.css');
</style>

<title>Mr Feriwala | Online Shopping Store</title>
<link rel="shortcut icon" href="../imaged/picks.png" />
<link href="https://fonts.maateen.me/charu-chandan-3d/font.css" rel="stylesheet">
<link rel = "stylesheet" href = "//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
      </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<!--<script src="js/jquerymain.js"></script>-->
<script src="js/script.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
--><script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<!--<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
--><link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">


<style>
div,body{
	margin: 0 !important;

}

.scroll-to-top {
  position: fixed;
  right: 15px;
  bottom: 15px;
  display: none;
  width: 50px;
  height: 50px;
  text-align: center;
  color: white;
  background: rgba(52, 58, 64, 0.5);
  line-height: 45px;
}

.scroll-to-top:focus, .scroll-to-top:hover {
  color: white;
}

.scroll-to-top:hover {
  background: #343a40;
}

.scroll-to-top i {
  font-weight: 800;
}


#sidebar-wrapper {
  position: fixed;
  z-index: 2;
  right: 0;
  width: 250px;
  height: 100%;
  transition: all 0.4s ease 0s;
  transform: translateX(250px);
  background: #f7f3f2;
  border-left: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}

.sidebar-nav li.sidebar-nav-item a {
  display: block;
  text-decoration: none;
  color: black;
  padding: 10px;
}

.sidebar-nav li a:hover {
  text-decoration: none;
  color: tomato;
  background: rgba(255, 255, 255, 0.5);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  font-size: 1.2rem;
  background: rgba(52, 58, 64, 0.1);
  height: 50px;
  line-height: 30px;
  padding-top: 13px;
  padding-bottom: 13px;
  padding-left: 15px;
}

.sidebar-nav > .sidebar-brand a {
  color: #fff;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}

#sidebar-wrapper.active {
  right: 250px;
  width: 250px;
  transition: all 0.4s ease 0s;
}

.menu-toggle {
  width: 50px;
  height: 50px;
  text-align: center;
  color: #fff;
  background: rgba(52, 58, 64, 0.5);
  line-height: 50px;
  z-index: 999;
}

.menu-toggle:focus, .menu-toggle:hover {
  color: #fff;
}

.menu-toggle:hover {
  //background: #343a40;
}
</style>

</head>

<body style="font-family:'Kalpurush'; background-color:#f5f5f5 !important; ">

		<nav id="sidebar-wrapper">
		<ul class="sidebar-nav">
		<li class="sidebar-brand bg-dark">
		<a class="" href="#page-top">MR. Hokar</a>
		</li>
		<li class="sidebar-nav-item">
			<a href="index.php" class="nav-link">HOME</a>
		</li>
		<li class="sidebar-nav-item">
			<a href="products.php" class="nav-link">PRODUCTS</a>
		</li>
		<li class="sidebar-nav-item">
			<a href="topbrands.php" class="nav-link">TOP BRANDS</a>
		</li>
		<li class="sidebar-nav-item">
			<?php
			$chkCart = $cart->checkCart();
			if($chkCart){ ?>
				<a href="cart.php" class="nav-link">CART</a>
			<?php
			$login = Session::get("customLogin");
			if($login == true){ ?>
				<a href="payment.php" class="nav-link">PAYMENT</a>
			<?php } ?>
			<?php } ?>
		</li>
		
		<li class="sidebar-nav-item"> 	
			<?php $login = Session::get("customLogin");
			if($login == true){
			?>
			
			<?php
			$chk = $cart->checkCart();
			$sum = Session::get("sum");

			?>
			</span>
			</span>
			</a>
			<?php }else{ ?>
			<a href="login.php"> LOGIN</a>
			<?php } ?>
		</li>  	
			

			
			<?php
			$cmrId = Session::get("customId");
			$chkOrder = $cart->checkOrder($cmrId);
			if($chkOrder){
			echo'	<li class="sidebar-nav-item"><a href="orderdetails.php" class="nav-link">ORDER</a></li>';
			}
			?>
			<?php
			$login = Session::get("customLogin");
			if($login == true){ ?>
			<li class="sidebar-nav-item"><a class="nav-link" href="profile.php">PROFILE</a> </li>
			<?php } ?>
			
			<?php
			$login = Session::get("customLogin");
			if($login == true){ ?>
			<li class="sidebar-nav-item"><a class="nav-link" href="?cid=<?php Session::get('customId');?>">LOGOUT <i class="fa fa-sign-out"></i></a></li>
			<?php }else{ ?>
			<li class="sidebar-nav-item">
			<a href="login.php" class="nav-link">ACCOUNT <i class="fa fa-sign-in"></i></a>
			</li>
			
			<?php } ?>
			<li class="sidebar-nav-item"><a href="contact.php" class="nav-link">CONTACT</a></li>
			<li class="sidebar-nav-item">
			<a href="it.php" class="nav-link">
			IT Solution
			</a>
			</li>
			<li class="sidebar-nav-item"><a class="nav-link" href="old.php">YOUR PRODUCT</a></li>
			</div>
			</div>
			
		</ul>
		</nav>





 


					  <?php
					  if(isset($_GET['cid'])){
					  $delCart = $cart->delCustCart();
					  Session::destroy();
					  }
					  ?>


<nav class="navbar navbar-light " style="background:#ebebeb " >

<a class="menu-toggle rounded" href="#">
			<i class="fa fa-bars"></i>
		</a>
		
<style>

	.navbar .cartText a{
		color:black;
		margin:8px;
		font-size:17px;
		list-style-type:none;
	}
  .navbar .cartText:hover{
    background: tomato;
  }
	.navbar .cartText a:hover{
	color:tomato;
  background: tomato;
  color:#fff;
  text-decoration:none;
}
.active{
	color:tomato;
}
</style>
  	  	
  <div class="d-inline-block cartText"> 	  	
  	  		<?php $login = Session::get("customLogin");
  	  		if($login == true){
  	  	?>
  	  	
	  	  	<a href="cart.php">
	  	  	<span class="btn" style="color:; background:#ebebeb;">CART:
	  	  	<span class="font-weight-bold">
  	  	<?php
  	  	$chk = $cart->checkCart();
  	  	if($chk){
  	  	$sum = Session::get("sum");
  	  	echo '৳'.$sum;
  	  	}else{
  	  	echo "৳0";
  	  	}
  	  	?>
  	  	</span>
  	  	</span>
  	  	</a>
  	  	<?php }else{ ?>
  	  		<a href="login.php" class=> LOGIN</a>
  	  	<?php } ?>
  	 </div>	  	  
</nav>


<div class="row text-center justify-content-center">
		    <div class="col-12 col-md-6 mt-3">
		    	 <a class="h4" href="index.php" style=" font-weight:900; font-family: 'CharukolaUltraLight'; color:tomato; margin:px">মি. হকার<br><p class='text-dark h6 mr-4'>Tech & Product Solutions</p>
		    	 </a>	   
			  	 			<?php
								  $terms = array();
								  $getPro = $pd->getSearchPro();
								  if($getPro){
								  while($result = $getPro->fetch_assoc()){
								  
								  array_push($terms, $result['productName']);
								  
								  ?>
								  
								  
								  <script>
								  $(function() {
								  var able = <?php echo json_encode($terms);?>		
								  $( "#tag" ).autocomplete({
								  source: able
								  });
								  
								  });
								  </script>
							  <?php }} ?>
  		</div>
		 <div class="col-10 col-md-4 mt-md-3">
			  <div class="navbar" id="srch" style="background:none;">	   
				  <form class="input-group" action="search.php" method="post">
						  <input required id="tag" name="search" type="text" class="form-control" placeholder="Search for products">
						  <div class="input-group-append">
						  	<button calss="btn" type="submit" name="sub" style="background: tomato; border:none; color:#fff"><i class="fa fa-search p-2"></i></button>					  
						  </div>	
				  </form>			    			    				  
			  </div>
		</div>	  
</div>


<script src="vendor/jquery-easing/jquery.easing.min.js"></script> 
<script src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

 // Closes the sidebar menu
 $(".menu-toggle").click(function(e) {
 e.preventDefault();
 $("#sidebar-wrapper").toggleClass("active");
 $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
 $(this).toggleClass("active");
 });
 

    $('body').append('<center class="lds-hourglass mt-5"></center>');
    $(window).on('load', function(){
    setTimeout(removeLoader, 80); //wait for page load PLUS two seconds.
    });
    function removeLoader(){
    $( ".lds-hourglass" ).fadeOut(500, function() {
    // fadeOut complete. Remove the loading div
    $( ".lds-hourglass" ).remove(); //makes page more lightweight 
    });  
    }
</script>

 <script>
  $(window).load(function(){
      var url = window.location.href;
      $('div .bar li a').find('active').removeClass('active');
      $('div .bar li a').filter(function(){
          return this.href == url;
      }).parent().addClass('active');
  });
</script>
	 
				 <div class="clear"></div>
				 
				 