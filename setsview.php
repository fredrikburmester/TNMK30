<!--Connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>
  <link rel="stylesheet" href="css/setsview.css">
</head>
<body>

<div class="grid">
  <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>
  <header class="headerright"><a href="blog.php">GROUP 18</a></header>

  <!--This site utilizes css-grids-->
  <article>
      <div class="titles">
        <h1>SEARCH SETS</h1>
        <h2><em>
          <?php
          //Preventing sql injection here would not make sense since we don't do any sql here. Only php.
          if(isset($_GET['search'])){
            $searchkey = $_GET['search'];
            $safe_searchkey = htmlspecialchars($searchkey);
            echo "You searched for: <span style=\"color: #EF5350\">" .$safe_searchkey. "</span>.";
          } else {
            echo "Here you can search for <span style=\"color: #EF5350\">sets</span> and sort appropriately by <span style=\"color: #EF5350\">pressing the titles.</span>";
          }
          ?>
        </em></h2>
      </div>
      <div class="line"><hr></div>
      <!--Searchbar-->
      <div class="search">
        <form action="setsview.php" class="container-1">
          <span class="icon"><i class="fa fa-coffee"></i></span>
          <input type="search" id="search" name="search" placeholder="Search Sets..."/>
        </form>
      </div>

      <div class="table">
        <?php
        $cookie_name = "search";

        //Has there been a search?
        if ( isset($_GET['search'])) {

          //If the cookie already exist, then use it, don't create a new one.
          if($_GET['search'] != $_COOKIE['search']){

            //Passing search into real_escape_string to prevent SQL injection.
            $query = mysqli_real_escape_string($conn, $_GET['search']) or die(mysql_error());

            //Using $query to create a cookie
            $cookie_value = $query;
            setcookie($cookie_name, $cookie_value, time() + 1200);
            $_COOKIE['search'] = $cookie_value;

          }

          //Counting the results, note that the cookie being used in future sql questions is sql-injection prevented.
        $howmany = "SELECT * FROM `sets` WHERE Setname LIKE '%$_COOKIE[search]%' OR SetID LIKE '%$_COOKIE[search]%' OR CatID LIKE '%$_COOKIE[search]%' OR Year LIKE '%$_COOKIE[search]%'";
        }

        //PRINTING STAGE
          //Count the results
        if(isset($_GET['search'])) {

          //Count the result with the apropriate $howmany query.
          $resultamount = mysqli_query($conn, $howmany);
          $num_rows = $resultamount->num_rows;
          //Count total amount of sets. This could be done once and stored in a cookie but then there would be no way of knowing if the databse table has been changed.
          //We could, for example, have a cookie life of a week and by that update the total amount every week.
          $howmany_total = "SELECT * FROM `sets`";
          $result_total = mysqli_query($conn, $howmany_total);
          $num_rows_total = $result_total->num_rows;

          if ($num_rows == 0 || $_GET['search'] == " " || $_GET['search'] == "  " || $_GET['search'] == "   ") {
            echo "<h1 style=\"\">No Results</h1>";
          } else {

            echo "<p>$num_rows Out of $num_rows_total Sets Found</p>\n\n";

            if ($_GET['sortname'] == 1) {
              $query = "SELECT * FROM `sets` WHERE Setname LIKE '%$_COOKIE[search]%' OR SetID LIKE '%$_COOKIE[search]%' OR CatID LIKE '%$_COOKIE[search]%' OR Year LIKE '%$_COOKIE[search]%' ORDER BY sets.setname ASC LIMIT 100";
            } else if (isset($_GET['sortname']) && $_GET['sortname'] == 0 ) {
              $query = "SELECT * FROM `sets` WHERE Setname LIKE '%$_COOKIE[search]%' OR SetID LIKE '%$_COOKIE[search]%' OR CatID LIKE '%$_COOKIE[search]%' OR Year LIKE '%$_COOKIE[search]%' ORDER BY sets.setname DESC LIMIT 100";
            } else {
              $query = "SELECT * FROM `sets` WHERE Setname LIKE '%$_COOKIE[search]%' OR SetID LIKE '%$_COOKIE[search]%' OR CatID LIKE '%$_COOKIE[search]%' OR Year LIKE '%$_COOKIE[search]%' ORDER BY setname DESC LIMIT 100";
            }

            $result = mysqli_query($conn, $query) or die(mysql_error());

            if (isset($_GET['sortname']) && $_GET['sortname'] == 1) {
              echo "<table class=\"table\">";
              echo "<tr><th>SetID</th><th>CatID</th><th><a href=\"setsview.php?search=".$_COOKIE['search']."&sortname=0\">Setname&nbsp&#160<i class=\"fa fa-sort\" aria-hidden=\"true\"></i></a></th><th>Year</th></tr>";
            } else {
              echo "<table class=\"table\">";
              echo "<tr><th>SetID</th><th>CatID</th><th><a href=\"setsview.php?search=".$_COOKIE['search']."&sortname=1\">Setname&nbsp&#160<i class=\"fa fa-sort\" aria-hidden=\"true\"></i></a></th><th>Year</th></tr>";
            }

            while($row = mysqli_fetch_array($result)){

              $name = str_replace(array("'"), "\'", htmlspecialchars($row['Setname'] ) );
              $Setname = $row['Setname'];

              echo "<tr style=\"cursor:pointer\" onclick=\"window.location='partview.php?setid=" .$row['SetID']. "&setname=".$name."';\">
              <td>" . $row['SetID'] . "</td>
              <td>" . $row['CatID'] . "</td>
              <td>" . $Setname . "</td>
              <td>" . $row['Year'] . "</td>
              </tr>";
            }
          echo "</table>";
          }
        }
        ?>
      </div>

  </article>

  <footer>
    Design by Group 18
  </footer>

</div>



</body>
</html>
