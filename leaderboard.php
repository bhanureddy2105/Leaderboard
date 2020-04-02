<?php

$conn= mysqli_connect('localhost','root','bhanu2105','leaderboard');
$query= 'select * from records';
$result=mysqli_query($conn,$query);

$results_per_page=10;
$number_of_results=mysqli_num_rows($result);
$number_of_pages=ceil($number_of_results/$results_per_page);


if (isset($_GET['page']) && !empty($_GET['page'])) {
 
  $page = $_GET['page'];
  $page=htmlentities($page);
} else {
  $page = 1;
}

$prev=$page-1;
$next=$page+1;

$this_page_first_result=($page-1) * $results_per_page;
$query='select * from records limit '.$this_page_first_result.','.$results_per_page;
$result=mysqli_query($conn,$query);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboard</title>
   <link rel="stylesheet" href="style1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
   
    
</head>
<body>
<header id="header">
                <div class="dropdown-bars">
                        <i class="fa fa-bars" id="bars" aria-hidden="true"></i> 
                    <div class="dropdown-content-bars">
                                <a href="/team-b(paymatrix)/login-signup-profile/profile.php#">Profile</a>
                                <a href="#">Settings</a>
                                <a href="/team-b(paymatrix)/login-signup-profile/logout.php">Logout</a>
                    </div>
                </div> 
                <a href="http://www.google.com"><img class="img" src="codeforlifelogo.jpg" alt="Sorry!image cannot be loaded"></a>
                <p class="title">CODING STAR</p>
                <ul class="list">
                        <li class="li-item"><a class="nav-links" href="/team-B(paymatrix)/practice/practice.html">practice </a></li>
                        <li class="li-item"><a class="nav-links"href="/team-b(paymatrix)/compete/compete.html">compete </a></li>
                        <li class="li-item"><a class="nav-links"href="/team-B(paymatrix)/leaderboard/leaderboard.php">leaderboard</a></li>
                </ul>
                <div class="search">
                    <i class="fa fa-search" id="search-icon" aria-hidden="true"></i>
                    <input type="text" id="search-bar" placeholder="Search">
                </div>
                <div class="icons">
                    <i class="fa fa-comment-o" id="message" aria-hidden="true"></i>
                    <i class="fa fa-bell-o"    id="comment" aria-hidden="true"></i>
                    <i class="fa fa-user-o" id="user" aria-hidden="true"></i>
                </div>
                <div class="dropdown">
                    <button class="username">username
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      
                            <a href="/team-b(paymatrix)/login-signup-profile/profile.php#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="/team-b(paymatrix)/login-signup-profile/logout.php">Logout</a>
                    </div>
                </div> 
        </header>
   
        <h1> <b>  Leaderboard </b></h1>
   


    <div id="main">
      <br>
        <div id="language"  style="background-color: white;">
        <h3><b>&nbsp;&nbsp;&nbsp;Java</b></h3>
        
        </div>
    
        <br>

        <div id="right">
            
                <p>CODERS  </p>
            
          <div id="all">
            <label class="form-check-label">
              <input type="radio" id="all"class="form-check-input" name="optradio" >ALL
            </label>
        
          </div>
          <div id="friends">
            <label class="form-check-label">
                <br>
              <input type="radio" class="form-check-input" name="optradio">Friends
            </label>
          </div>
          <br>

          <hr>
          <p>FILTER BY</p>
            <div id="coder">
            

              <p>CODER</p>
            
              <input id="myInput" onkeyup="myFunction()" type="text" placeholder="Search">
            
              
            </div>
    
            <div id="country">
             
           <p>COUNTRY</p>

           <input class="form-control" id="myInput1" onkeyup="myFunction1()" type="text" placeholder="Search">
            
          <!-- <br><br><br> -->
            </div>
            
        </div>
      
    

    <div class="">
        <table  id="myTable">
            
            <tr class="header">
                <th>CODER</th>
                <th>RANK</th>
                <th>COUNTRY</th>
                <th>SCORE</th>
            </tr>
            
            <?php
       while($rows=mysqli_fetch_assoc($result))
       {
        ?>
        <tr>
          <td> <?php echo $rows['hacker']; ?></td>
          <td> <?php echo $rows['rank']; ?></td>
          <td> <?php echo $rows['country']; ?></td>
          <td> <?php echo $rows['score']; ?></td>
          
        </tr>
      <?php
        }
      ?>
            
        </table>
        </div>
        <br>
        <br>
        <br>
        

     <div class="center">
    <div class="pagination" id="page">

    <?php if($page==1){ ?>
    <a href="#"><b>&laquo;</b></a>

    <?php } ?>
    <?php if($page!=1){ ?>
    <a href="leaderboard.php?page=<?=$prev;?>"><b>&laquo;</b></a>
    <?php } ?>
      <?php
      for($i=1;$i<=$number_of_pages;$i++){ 

      ?>

       <?php if($i==$page) {?>
      
     <?php echo "<a class='active'>" .$i.'</a>'; ?>

       <?php } else{?>

      <?php echo '<a href="leaderboard.php?page=' . $i . '" >' . $i . '</a> '; ?>
  
       
       <?php } ?>
      <?php
      }
      ?>      

  <a href="leaderboard.php?page=<?=$next;?>"><b>&raquo;</b></a>

    </div>
    </div>

    <br>
    <br>
    <br>

  

  </div>
 
 <br><br><br><br><br><br><br><br>

  <!-- HTML FOR FOOTER -->
  <div class="footer-main-div"> 
    <div class="footer-tags">
  <ul>
    <li class="link-item"><a id="a"href="#">Contest Calender</a>   </li>
    <li class="link-item"><a id="a"href="#">Blog</a>   </li>
    <li class="link-item"><a id="a"href="#">Scoring</a>    </li>
    <li class="link-item"><a id="a"href="#">Environment</a>    </li>
    <li class="link-item"><a id="a"href="#">FAQ</a>    </li>
    <li class="link-item"><a id="a"href="#">About Us</a>   </li>
    <li class="link-item"><a id="a"href="#">Support</a>    </li>
    <li class="link-item"><a id="a"href="#">Careers</a>    </li>
    <li class="link-item"><a id="a"href="#">Terms Of Service</a>    </li>
    <li class="link-item"><a id="a"href="#">Privacy Policy</a>    </li>
    <li class=""><a id="a"href="#">Request a Feature</a>    </li>

    </ul>

    </div>
  </div>

 
  <!-- END OF FOOTER HTML -->


    <script>
  var input,input1, filter, table, tr, td, i, txtValue;
  function myFunction() {
  input = document.getElementById("myInput");
  
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction1() {
 
 input1= document.getElementById("myInput1");
 
 filter = input1.value.toUpperCase();
//  table = document.getElementById("myTable");
 tr = document.getElementsByTagName("tr");

 
 for (i = 0; i < tr.length; i++) {
   td = tr[i].getElementsByTagName("td")[2];
   if (td) {
     txtValue = td.textContent || td.innerText;
     if (txtValue.toUpperCase().indexOf(filter) > -1) {
       tr[i].style.display = "";
     } else {
       tr[i].style.display = "none";
     }
   }
 }
}


  </script>
    
</body>
</html>
