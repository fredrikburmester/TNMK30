<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>

  <link rel="stylesheet" href="css/individual_part_view.css">
</head>
<body>
<!--Creating the querystring-->
  <?php

  $ItemtypeID = $_GET['itemtypeid'];
  $ColorID = $_GET['colorid'];
  $ItemID = $_GET['itemid'];
  $Partname = $_GET['partname'];

  $ItemtypeIDsafe = htmlspecialchars($ItemtypeID);
  $ColorIDsafe = htmlspecialchars($ColorID);
  $ItemIDsafe = htmlspecialchars($ItemID);
  $Partnamesafe = htmlspecialchars($Partname);


  $query = "SELECT
  * FROM images

  WHERE

  images.itemtypeid = '$ItemtypeIDsafe'
  AND images.itemid = '$ItemID'
  AND images.colorid = '$ColorID'";

  $result = mysqli_query($conn, $query) or die(mysql_error());
  $row = mysqli_fetch_array($result);

  //Depending on the fileformat used for a specific part.
  $prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
  if($row['has_largejpg']) {
    $filename = $ItemtypeIDsafe.'L/'.$ItemIDsafe.'.jpg';
  } else if($row['has_largegif']) {
    $filename = $ItemtypeIDsafe.'L/'.$ItemIDsafe.'.gif';
  } else if ($row['has_jpg']){
    $filename = $ItemtypeIDsafe.'/'.$ColorIDsafe.'/'.$ItemIDsafe.'.jpg';
  } else if ($row['has_gif']) {
    $filename = $ItemtypeIDsafe.'/'.$ColorIDsafe.'/'.$ItemIDsafe.'.gif';
  } else {
    //If the part doesn't have an image, display this.
    $filename = "noimage_small.png";
  }
  ?>

  <div class="grid">

    <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>

    <header class="headerright"><a href="blog.php">GROUP 18</a></header>

    <!--This site utilizes css grids-->
    <article>
      <div class="titles">
        <h1>LEGO PART</h1>
        <h2><em><span style="color:red">
          <?php
          echo $Partname."</span>";
          echo "<br><br>And respective sets in which this piece recides";
          ?>
        </em></h2>
      </div>
      <div class="line"><hr></div>
      <div class="search">
        <img src="<?php echo $prefix; echo $filename;?>" alt="No existing image"/>
      </div>

      <!--Fetches the information for which sets a certain part is included-->
      <div class="table">

        <?php

        $query3 = "SELECT

        sets.setname,
        sets.setid,
        sets.catid,
        sets.year,
        inventory.setid,
        inventory.itemid,
        inventory.colorid

        FROM sets, inventory
        WHERE inventory.colorid = $ColorIDsafe
              AND inventory.itemid = $ItemIDsafe
              AND sets.setid = inventory.setid";

          //PRINTING STAGE

            $result2 = mysqli_query($conn, $query3) or die(mysql_error());

            echo "<table class=\"table\">";
            echo "<tr><th>SetID:</th><th>Setname:</th><th>CatID:</th><th>Year:</th></tr>";

            do{

              //Fix for apostrophes
              $name = str_replace(array("'"), "\'", htmlspecialchars($row['setname'] ) );

              $Setname = $row['setname'];

              $SetID = $row['setid'];
              $CatID = $row['catid'];
              $Year = $row['year'];

              echo "<tr style=\"cursor:pointer\" onclick=\"window.location='partview.php?setid=".$SetID."&setname=".$name."';\">
              <td>$SetID</td>
              <td>$Setname</td>
              <td>$CatID</td>
              <td>$Year</td>

              </tr>";
            } while($row = mysqli_fetch_array($result2));
            echo "</table>";
    ?>
  </div>

</article>

<footer>
  Design by Group 18
</footer>

</div>

</body>
</html>
