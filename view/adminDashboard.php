<?php
include("../control/dashboardCheck.php");
include("../control/adminProfileData.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/dashboard.css" />
    <title>Document</title>
  </head>
  <body>
    <main class="main_container">
      <!-- Sidebar -->
      <nav class="nav">
        <!-- Logo -->
        <figure class="logo_wrapper">
          <a href="/">
            <img class="logo" src="../resources/static/hospital-logo.png" alt="logo" />
          </a>
        </figure>

        <!-- Nav Links  -->
        <div class="nav_items_wrapper">
          <a href="adminDashboard.php" class="nav_item">
            <figure class="nav_icon">
              <img src="../resources/static/icons/home.png" alt="home-icon" />
            </figure>
            <span>Dashboard</span>
          </a>
          <a href="/" class="nav_item">
            <figure class="nav_icon">
              <img src="../resources/static/icons/balance.png" alt="home-icon" />
            </figure>
            <span>Balance</span>
          </a>
          <a href="/" class="nav_item">
            <figure class="nav_icon">
              <img src="../resources/static/icons/invoice.png" alt="home-icon" />
            </figure>
            <span>Doctors List</span>
          </a>
          <a href="/" class="nav_item">
            <figure class="nav_icon">
              <img src="../resources/static/icons/patient.png" alt="Patient-icon" />
            </figure>
            <span>Patient List</span>
          </a>
          <a href="/" class="nav_item">
            <figure class="nav_icon">
              <img src="../resources/static/icons/transection.png" alt="home-icon" />
            </figure>
            <span>Salary Generation </span>
          </a>
        </div>
        <div class="log_out_warpper">
          <a class="nav_item" href="../control/logout.php">
            <img src="../resources/static/icons/log-out.png" alt="" />
            <span>Log Out</span>
          </a>
        </div>
      </nav>

      <!-- Main Contents -->
      <section class="content_body">
        <!-- Header -->
        <section class="header">
          <!-- Searchbar -->
          <div class="searchbar_warpper">
            <div class="searchbar">
              <img src="../resources/static/icons/search.png" alt="search icon" />
              <input placeholder="Search" type="text" />
            </div>
          </div>
          <!-- CTAS -->
          <div class="header_ctas">
            <figure class="_icon">
              <img src="../resources/static/icons/DOctor-list.png" alt="Doctor icon" />
            </figure>
            <figure class="_icon">
              <img
                src="../resources/static/icons/pngtree-vector-location-icon-png-image_515424.jpg"
                alt="notification icon"
              />
            </figure>
            <figure class="_icon">
              <img src="../resources/static/icons/png-transparent-computer-icons-gear-setting-area-setting-set.png" alt="setting icon" />
            </figure>
            <div class="user">
              <figure>
                <img
                 src="<?php echo $_SESSION['adminPhoto'];?>"
                  alt="user image"
                />
                <figcaption>
                  <form action="profile.php">
                    <input class="textBtn" type="submit" value="<?php echo $_SESSION['adminFName'];?>" />
                  </form> 
                </figcaption>
              </figure>
            </div>
          </div>
        </section>
        <!-- Dashboard -->
        <section class="dashboard">
          <h1 class="header">ABC HOSPITAL</h1>
          <!-- status -->
          <section class="status_container">
            <div class="status">
              <header>
                <h6 class="status_header">Total Balace</h6>
                <span class="status_value">100000000৳
                  <br/>
                  BDT</span
                >
              </header>
              <figure class="status_icon">
                <img src="../resources/static/dashboard/background-1.svg" alt="" />
              </figure>
            </div>
            <div class="status">
              <header>
                <h6 class="status_header">Total Doctor</h6>
                <span class="status_value">25
                <br/>
                  Person</span
                >

                
                </span>
              </header>
              <figure class="status_icon">
                <img src="../resources/static/dashboard/background-2.svg" alt="" />
              </figure>
            </div>
            <div class="status">
              <header>
                <h6 class="status_header">Total COmplain</h6>
                <span class="status_value">14</span>
              </header>
              <figure class="status_icon">
                <img src="../resources/static/dashboard/background-3.svg" alt="" />
              </figure>
            </div>
            <div class="status">
              <header>
                <h6 class="status_header">Patient Due</h6>
                <span class="status_value">200000৳
                <br/>
                  BDT</span

              
                  
                >
              </header>
              <figure class="status_icon">
                <img src="../resources/static/dashboard/background-4.svg" alt="" />
              </figure>
            </div>
          </section>
          <!-- Lists -->
          <section class="lists">
            <div class="list">
              <header class="list_header">
                <h5>Hospital Employe's</h5>
              </header>
              <form class="list_form">
                <div>
                  <img
                    src="../resources/static/icons/search.png"
                    alt="search icon"
                  />
                  <input id="employee_list_input" placeholder="Search" type="text" />
                </div>
                <a class="list_form_button" href="addEmplyee.php"><img src="../resources/static/icons/plus.png" alt="button" /> </a>    
                </button>
              </form>

              <ul class="list_item_container employee_list">

              <?php
                 
                  require_once("../model/employeeData.php");
                  $admindb = new eDatabase();
                  $conObj=$admindb->openCon();
                  $result = $admindb->viewAllEmployee($conObj);

                  if ($result ->num_rows >0){

                  while ($myrow = $result ->fetch_assoc()){
                      echo "<li class=list_item><div class=list_item_content><figure><img src=";
                      echo $myrow["ePhoto"]." alt=user /></figure>";
                      echo "<span> <span class=list_item_header>";
                      echo $myrow["eFName"]." ".$myrow["eLName"] ."</span>";
                      echo "<p class=list_item_description>".$myrow["eJobTitle"]."</p></span></div>"; 
                      echo "<span class=list_item_date>Show</span></li>";
                  }
                }
                mysqli_close($conObj);       
             ?>

              </ul>
              <button class="lists_cta_btn">View More</button>
            </div>
            <div class="list">
              <header class="list_header">
                <h5>Patient List</h5>
              </header>
              <form class="list_form">
                <div>
                  <img
                    src="../resources/static/icons/search.png"
                    alt="search icon"
                  />
                  <input placeholder="Search" type="text" />
                </div>
              <a class="list_form_button" href="addEmployee.php">
                <img src="../resources/static/icons/plus.png" alt="button" />
               </a>    
              </form>
              <ul class="list_item_container">
              <?php
                 
                 require_once("../model/customerData.php");
                 $admindb = new cDatabase();
                 $conObj=$admindb->openCon();
                 $result = $admindb->viewAllCustomer($conObj);

                 if ($result ->num_rows >0){

                 while ($myrow = $result ->fetch_assoc()){
                     echo "<li class=list_item><div class=list_item_content><figure><img src=";
                     echo "../files/photos/";
                     echo $myrow["cName"].".jpg alt=user /></figure>";
                     echo "<span> <span class=list_item_header>";
                     echo $myrow["cName"] ."</span>";
                     echo "<p class=list_item_description>".$myrow["CAccNo"]."</p></span></div>"; 
                     echo "<span class=list_item_date>Show</span></li>";
                 }
               }
               mysqli_close($conObj);       
            ?>
              </ul>
              <button class="lists_cta_btn">View More</button>
            </div>
            <div></div>
          </section>
        </section>
      </section>
    </main>

    <script src="../javascript/search.js"></script>
  </body>
</html>


