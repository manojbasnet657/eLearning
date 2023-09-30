<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro School</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
.dropbtn {
  /* background-color: #04AA6D;
  color: white; */
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
   


<body>
    <?php
        include'./database.php';
    ?>
    <nav style="z-index: 800;" class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid font-monospace">
            <a href="index.php" class="navbar-brand">
                <i class="fas fa-school text-danger">Hamro School</i> 
        <div class="d-flex">
        
         <a href="cart.php" class="text-white text-decoration-none pe-2"> </a>
        <span class="text-danger pe-2 ">
            <i class="fas fa-user-shield "></i> Hello,
            <?php
             session_start();
            if(isset(  $_SESSION['user'])){
           
            echo $_SESSION['user'] ; 
            echo"
           |<a href='logouts.php' class='text-danger text-decoration-none pe-2'><i class='fas fa-sign-in-alt'></i>Logout |</a>
         ";
        }
        else{
            echo"
            |<a href='user-login.php' class='text-danger text-decoration-none pe-2'><i class='fas fa-sign-in-alt'></i>Login |</a>
           
        ";
    }
  
            ?> 

            <a href="product/admin.php" class="text-danger text-decoration-none pe-2">Admin</a>
        </span>
        </div>
    </nav> 
 </div>
 <nav style="z-index: 800;"class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">

            <!-- <span class="navbar-toggler-icon"></span> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class=" text-center">
                        <a class="text-light nav-link  active" aria-current="page" href="index.php">HOME</a>
                    </li>

                    <li class="col-4 text-center">
                        <a class="text-light nav-link" href="about.php">ABOUT US</a>
                    </li>
                    <li class="col-4 text-center">
                        <a class="text-light nav-link " href="contact.php">CONTACT US  </a>
                    </li>
                    <li class="col-4 text-center dropdown">
                     <a class="text-light nav-link dropbtn p-2"  href="#">COURSE</a>
                      <div class=" dropdown-content">
                        <a href="java.php">Java</a>
                        <a href="javascript.php">Javascript</a>
                        <a href="python.php">Python</a>
                        <a href="html.php">Html</a>
                        <a href="php.php">Php</a>
                      </div>
                    
                    </li>
                   

                </ul>
                
            </div>
             <form action="http://localhost/elearning/search.php" method="get" class="d-flex flex-row" role="search">
                <input class="form-control me-2" type="search" placeholder="Search"name="searchText" aria-label="Search">
                <button class="btn btn-dark" type="submit" name="searchBtn">Search</button>
            </form> 
        </div>
            </div>
            
        </div>
    </nav>
    <div class=" fs-5 font-monospace text-center">
       <p class="fixed-bottom text-white bg-danger text-center p-0  mb-0">Copyright © 2023  </p> 
    </div>
   
</body>

</html>