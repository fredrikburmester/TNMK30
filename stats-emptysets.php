<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>
<link rel="stylesheet" href="css/graphs_2.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>

</head>
<body>

  <div class="grid">
    <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>
    <header class="headerright"><a href="blog.php">GROUP 18</a></header>

    <!-- SOME PHP -->
    <?php

    /*$query = "SELECT sets.setid from sets order by setid asc";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $i = 0;

    while($row = mysqli_fetch_array($result)) {
      $query2 = "SELECT parts.partid,
      parts.partname,
      inventory.setid,
      inventory.itemid

      FROM parts, inventory
      WHERE inventory.setid = '$row[setid]'
      AND inventory.itemid = parts.partid limit 1";

        $result_total = mysqli_query($conn, $query2);
        $num_rows_total = $result_total->num_rows;

        if($num_rows_total == 0) {
          $i = $i+1;
        }


    }
    echo $i;*/

    $query = "SELECT COUNT(Year), Year
    FROM sets
    WHERE Year % 2 = 0
    GROUP BY Year
    ORDER BY Year DESC";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    ?>

    <?php
    $howmany = "SELECT COUNT(Year), Year
    FROM sets
    WHERE Year % 2 = 0
    GROUP BY Year
    ORDER BY Year DESC";
    $howmany_count = mysqli_query($conn, $howmany);
    $num_rows = $howmany_count->num_rows;

    $i = 1;
    ?>

    <!--This site utilizes css grids-->
    <article>
      <canvas id="myChart" width="150" height="100"></canvas>
      <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'doughnut',

      // The data for our dataset
      data: {
      labels: ["Empty Sets", "Sets with pieces"],
      datasets: [{
      label: "My First dataset",
      backgroundColor: ['rgb(255, 99, 132)','rgb(0, 120, 150)'],
      borderColor: 'rgb(255, 255, 255)',
      data: [2320, 11040],
      }]
      },

      // Configuration options go here
      options: {}
      });
      </script>
    </article>

    <footer>
      <a>Design by Group 18</a>
    </footer>

  </div>
</body>
</html>
