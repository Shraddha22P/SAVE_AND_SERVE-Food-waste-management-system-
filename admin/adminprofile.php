<?php
// $connection = mysqli_connect("localhost:3306", "root", "");
// $db = mysqli_select_db($connection, 'demo');
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>


   



    <section class="dashboard">


   



        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Your <b style="color: #06C167; ">History</b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <br>
        <br>
        <br>
        <div class="activity">
        <div class="table-container">
         
         <div class="table-wrapper">
         <table class="table">
        <thead>
        <tr>
            <th >Name</th>
            <th>food</th>
            <th>Category</th>
            <th>phoneno</th>
            <th>date/time</th>
            <th>address</th>
            <th>Quantity</th>
            <!-- <th>Action</th> -->
         
          
           
        </tr>
        </thead>
         <?php
          


          // Define the SQL query to fetch unassigned orders
          $id=$_SESSION['Aid'];
          $sql = "SELECT * FROM food_donations WHERE assigned_to =$id";
          
          // Execute the query
          $result=mysqli_query($connection, $sql);
      
          
          // Check for errors
          if (!$result) {
              die("Error executing query: " . mysqli_error($conn));
          }
          
          // Fetch the data as an associative array
          $data = array();
          while ($row = mysqli_fetch_assoc($result)) {
              $data[] = $row;
          }
    
      
       ?> 
    
        </tbody>
        <?php foreach ($data as $row) { ?>
        <?php    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"food\">".$row['food']."</td><td data-label=\"category\">".$row['category']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Address\">".$row['address']."</td><td data-label=\"quantity\">".$row['quantity']."</td>";
?>
  <?php } ?>
    </table>
         </div>
                </div>
                
         
            
        </div>
            <!-- <P>Your history</P> -->

            <div class="profile">
    <!-- <section class="cover" >
        
        </section>
     -->
        <div class="profilebox" style="">
          
            <p class="headingline" style="text-align: left;font-size:30px;"> <img src="" alt="" style="width:40px; height:  height: 25px;; padding-right: 10px; position: relative;" >Profile</p>
<!--             
            <img src="user.png" alt="" style="  width: 90px;
            height: 90px;
            /* border-radius:50% ;  */
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 10px;
             /* border: 1px solid #06C167; */
            ">
            <br> -->
              <!-- <p style="font-size: 28px;">welcome</p> -->
              <!-- <p style="color: #06C167;">username</p> -->
              <br>
              <div class="info" style="padding-left:10px;">
              <p style="">Name  :<?php echo"". $_SESSION['name'] ;?> </p><br>
              <p style="">Email :<?php echo"". $_SESSION['email'];?> </p><br>
            
              
              <a href="../logout.php" style="float: left;margin-top: 6px ;border-radius:5px; background-color: #06C167; color: white;padding: ;padding-left: 10px;padding-right: 10px;">Logout</a>
              </div>






           
        

    </section>
    <script src="admin.js"></script>
</body>
</html>