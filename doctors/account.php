
<?php 
	include_once "../php/config.php";
	if (isset($_COOKIE['did'])) {
		$did = $_COOKIE['did'];
		echo $did;
	} else {
		echo 'no cookie';
	}

	$sql = "SELECT * FROM doctor_login WHERE did = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $did);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

?>


<?php 
    include_once "../php/config.php";

    if (isset($_POST['manage'])) {
        if (isset($_COOKIE['did'])) {
            $did = $_COOKIE['did'];
        }

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

            
            $updateSql = "UPDATE doctor_login SET firstname = ?, lastname = ?, email = ?, password = ? WHERE did = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("sssss", $firstname, $lastname, $email, $password, $did);
            
            if ($updateStmt->execute() === TRUE) {
                echo '<script>alert("Successfully updated your info");</script>';
				echo '<script>document.location.href="account.php";</script>';
            } else {
                echo "Error: " . $updateStmt->error;
            }
            
            $updateStmt->close();

        $conn->close();
    }
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<style>
		input {
			border: none;
			outline: none;
		}
	</style>

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
			        
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="search-mobile-trigger d-sm-none col">
			            <i class="search-mobile-trigger-icon fas fa-search"></i>
			        </div><!--//col-->
		            <div class="app-search-box col">
		               
		            </div><!--//app-search-box-->
		            
		            <div class="app-utilities col-auto">
			            <!--//app-utility-item-->
			            <!--//app-utility-item-->
			            
			            <div class="app-utility-item app-user-dropdown dropdown">
				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="account.php">Account</a></li>
								
								<?php
									if (isset($_COOKIE['did'])) {
										$user_id = $_COOKIE['did'];
										// Perform actions that a logged-in user can do
										echo '<a>
										<form method="post" action="index.php">
												<li><hr class="dropdown-divider"></li>
												<input type="submit" name="logout" value="Logout" class="logout-button">
											</form>
											</a>';
									} 

									if (isset($_POST['logout'])) {
										// Set the expiration time of the cookie to a time in the past to delete it
										setcookie("did", "", time() - 3600, "/");
										header("Location: login.php"); // Redirect to the login page after logout
										exit;
									}
								?>
							</ul>
			            </div><!--//app-user-dropdown--> 
		            </div><!--//app-utilities-->
		        </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
	        <div id="sidepanel-drop" class="sidepanel-drop"></div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app-branding">
		            <a class="app-logo" href="index.php"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>
	
		        </div><!--//app-branding-->  
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="index.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
		  <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
		</svg>
						         </span>
		                         <span class="nav-link-text">Overview</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <!--//nav-item-->
					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link" href="status.php">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
  <circle cx="3.5" cy="5.5" r=".5"/>
  <circle cx="3.5" cy="8" r=".5"/>
  <circle cx="3.5" cy="10.5" r=".5"/>
</svg>
						         </span>
		                         <span class="nav-link-text">Status</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->
					    <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="true" aria-controls="submenu-1">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
	  <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
	</svg>
						         </span>
		                         <span class="nav-link-text">Pages</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
	</svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-1" class="collapse submenu submenu-1 show" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
							        
							        <li class="submenu-item"><a class="submenu-link active" href="account.php">Account</a></li>
									<li class="submenu-item"><a class="submenu-link" href="edit.php">Edit Details</a></li>
							        
							        
						        </ul>
					        </div>
					    </li><!--//nav-item-->
				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
			    <div class="app-sidepanel-footer">
				    <nav class="app-nav app-nav-footer">
					    <ul class="app-menu footer-menu list-unstyled">
						    <!--//nav-item-->
						   
						
					    </ul><!--//footer-menu-->
				    </nav>
			    </div><!--//app-sidepanel-footer-->
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">My Account</h1>
				<form action="account.php" method="post" onsubmit="return validate();">
					<div class="row gy-4">
						<div class="col-12 col-lg-6">
							<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
								<div class="app-card-header p-3 border-bottom-0">
									<div class="row align-items-center gx-3">
										<div class="col-auto">
											<div class="app-icon-holder">
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 
													5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 
													10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
												</svg>
											</div><!--//icon-holder-->
											
										</div><!--//col-->
										<div class="col-auto">
											<h4 class="app-card-title">Profile</h4>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//app-card-header-->
								<div class="app-card-body px-4 w-100">
									<div class="item border-bottom py-3">
										<div class="row justify-content-between align-items-center">
											<div class="col-auto">
												<div class="item-label"><strong>First Name</strong></div>
												<input type="text" class="item-data" value="<?php echo $row['firstname'];?>" name="firstname">
											</div><!--//col-->
											
										</div><!--//row-->
									</div><!--//item-->
									<div class="item border-bottom py-3">
										<div class="row justify-content-between align-items-center">
											<div class="col-auto">
												<div class="item-label"><strong>Last Name</strong></div>
												<input type="text" class="item-data" value="<?php echo $row['lastname']; ?>" name="lastname">
											</div><!--//col-->
											<!--//col-->
										</div><!--//row-->
									</div><!--//item-->
									<div class="item border-bottom py-3">
										<div class="row justify-content-between align-items-center">
											<div class="col-auto">
												<div class="item-label"><strong>Email</strong></div>
												<input type="text" class="item-data" value="<?php echo $row['email']; ?>" name="email">
											</div><!--//col-->
											<!--//col-->
										</div><!--//row-->
									</div><!--//item-->
									<div class="item border-bottom py-3">
										<div class="row justify-content-between align-items-center">
											<div class="col-auto">
												<div class="item-label"><strong>Password</strong></div>
												<input type="password" id="password" class="item-data" value="<?php echo $row['password'];?>" name="password">
											</div><!--//col-->
											<!--//col-->
										</div><!--//row-->
									</div><!--//item-->
									<div class="item border-bottom py-3">
										<div class="row justify-content-between align-items-center">
											<div class="col-auto">
												<div class="item-label"><strong>Confirm Password</strong></div>
												<input type="password" class="item-data" id="c" name="password">
											</div><!--//col-->
											<!--//col-->
										</div><!--//row-->
									</div><!--//item-->
								</div><!--//app-card-body-->
								<div class="app-card-footer p-4 mt-auto">
									<input type="submit" class="btn app-btn-secondary" value="Manage Profile" name="manage">
								</div><!--//app-card-footer-->
							</div>
						</div>
					</div><!--//app-card-->
				</form><!--//col-->
			</div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

	<!--Custom JS-->

	<script>
		function validate(){
			let password = document.getElementById('password').value;
			let confirm = document.getElementById('c').value;

			if (password !=confirm) {
				alert('passwords are not same');
				return false;
			}

			if (password.length < 8) {
				alert('password should be more than 8 characters');
				return false;
			}
			return true;
		}
	</script>
	
</body>
</html> 

