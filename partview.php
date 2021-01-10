<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>

  <link rel="stylesheet" href="css/setsview.css">
</head>
<body>

  <?php
  if (isset($_GET['setname']) || isset($_GET['setid'])) {

    $cookie_name_setname = "setname";
    $cookie_value_setname = $_GET['setname'];
    setcookie($cookie_name_setname, $cookie_value_setname, time() + 1200);
    $_COOKIE['setname'] = $cookie_value_setname;

    $cookie_name_setid = "setid";
    $cookie_value_setid = $_GET['setid'];
    setcookie($cookie_name_setid, $cookie_value_setid, time() + 1200);
    $_COOKIE['setid'] = $cookie_value_setid;
  }

  $query = "SELECT parts.partid,
  parts.partname,
  inventory.setid,
  inventory.itemid,
  inventory.colorid,
  images.itemtypeid,
  images.itemid,
  images.colorid,
  images.has_gif,
  images.has_jpg,
  images.has_largegif,
  images.has_largejpg

  FROM parts, inventory, images
  WHERE inventory.setid = '$_COOKIE[setid]'
  AND inventory.itemid = parts.partid
  AND inventory.itemid = images.itemid
  AND inventory.colorid = images.colorid
  AND inventory.itemtypeid = images.itemtypeid

  ORDER BY partname ASC";
  $result2 = mysqli_query($conn, $query);
  $num_rows = $result2->num_rows;
  ?>

  <div class="grid">

    <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>

    <header class="headerright"><a href="blog.php">GROUP 18</a></header>

    <!--This site utilizes css grids-->
    <article>
      <div class="titles">
        <h1>LEGO SET</h1>
        <h2><em><span style="color:red">
          <?php
          echo $_COOKIE['setname']."</span>";
          echo "<br><br>" .$num_rows. " Parts in this set";
          ?>
        </em></h2>
      </div>
      <div class="line"><hr></div>
      <!--Searchbar for parts in set-->
      <div class="search">
        <form action="partview.php" class="container-1">
          <span class="icon"><i class="fa fa-coffee"></i></span>
          <input type="search" id="search" name="partsearch" placeholder="Search Parts In This Set..."/>
        </form>
      </div>

      <div class="table">

        <?php
        //If a set is empty, print the following.
        if ($num_rows == 0) {
          echo "<h2>Sorry, No Parts In This Set</h2>";
        } else {
        //Else, proceed to create the querystring
          if (isset($_GET['partsearch'])) {

            if($_GET['partsearch'] != $_COOKIE['partsearch']){
              $search = mysqli_real_escape_string($conn, $_GET['partsearch']) or die(mysql_error());
              $cookie_name_partsearch = "partsearch";
              $cookie_value_partsearch = $search;
              setcookie($cookie_name_partsearch, $cookie_value_partsearch, time() + 1200);
              //Save the cookie value in it self to be used during the first pageload where the cookie techically does not yet exist.
              $_COOKIE['partsearch'] = $cookie_value_partsearch;
            }
            //Querystring
            $query = "SELECT parts.partid,
            parts.partname,
            inventory.setid,
            inventory.itemid,
            inventory.colorid,
            images.itemtypeid,
            images.itemid,
            images.colorid,
            images.has_gif,
            images.has_jpg,
            images.has_largegif,
            images.has_largejpg

            FROM parts, inventory, images
            WHERE inventory.setid = '$_COOKIE[setid]'
            AND inventory.itemid = parts.partid
            AND inventory.itemid = images.itemid
            AND inventory.colorid = images.colorid
            AND inventory.itemtypeid = images.itemtypeid
            AND parts.partname LIKE '%$_COOKIE[partsearch]%'

            ORDER BY partname ASC";
            $result2 = mysqli_query($conn, $query);
            $num_rows = $result2->num_rows;
          }

          //PRINTING STAGE
          //If the search consists of 0 results or 1, 2, 3 whitspace(s), print errormessage.
          if(isset($_GET['partsearch']) && $num_rows == 0 || $_GET['partsearch'] == " " || $_GET['partsearch'] == "  " || $_GET['partsearch'] == "   ") {
            echo "<h2>Sorry, No Parts Mached Your Search</h2>";
          } else {
            $result = mysqli_query($conn, $query);
            echo "$num_rows Results";

            echo "<table class=\"table\">";
            echo "<tr><th>Partname:</th><th>Image:</th></tr>";

            while($row = mysqli_fetch_array($result)){
              $prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";

              $ItemID = $row['itemid'];
              $Partname = $row['partname'];
              //Fix for apostrophes
              $Partnamefix = str_replace(array("'"), "\'", htmlspecialchars($Partname) );

              $SetID = $row['setid'];
              $ColorID = $row['colorid'];
              $ItemtypeID = $row['itemtypeid'];

              //Depending on the image fileformat.
              if($row['has_jpg']) {
                $filename = "$ItemtypeID/$ColorID/$ItemID.jpg";
              } else if($row['has_gif']) {
                $filename = "$ItemtypeID/$ColorID/$ItemID.gif";
              } else {
                //If no image exists, display this.
                $filename = "noimage_small.png";
              }

              echo "<tr style=\"cursor:pointer\" onclick=\"window.location='individual_part_view.php?itemtypeid=".$ItemtypeID."&colorid=".$ColorID."&itemid=".$ItemID."&partname=".$Partnamefix."';\">
              <td>$Partname</td>
              <td><img src=\"$prefix$filename\" alt=\"No existing image\"/></td>
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
