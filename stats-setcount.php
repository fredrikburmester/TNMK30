<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>
<link rel="stylesheet" href="css/graphs.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>

</head>
<body>

  <div class="grid">
    <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>
    <header class="headerright"><a href="blog.php">GROUP 18</a></header>

    <!-- SOME PHP -->
    <?php
    $query = "SELECT COUNT(Year), Year
    FROM sets
    WHERE Year % 2 = 0
    GROUP BY Year
    ORDER BY Year DESC";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $result2 = mysqli_query($conn, $query) or die(mysql_error());
    $result3 = mysqli_query($conn, $query) or die(mysql_error());
    $result4 = mysqli_query($conn, $query) or die(mysql_error());
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
      <script>
      if ( $(window).width() < 760) {
        document.write('<canvas id="myChart" width="350" height="550"></canvas>');
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {

            labels: [
              <?php
              while($row = mysqli_fetch_array($result)){
                if($row['Year'] != 0) {
                  echo "\"" .$row['Year']. "\", ";
                }
              }
              ?>],
              datasets: [{
                label: 'Number of sets / year',
                /*data: [12, 19, 3, 5, 2, 3],*/
                data: [
                  <?php
                  while($row = mysqli_fetch_array($result2)){
                    if($row['Year'] != 0) {
                      echo $row['COUNT(Year)'];
                      if($i < $num_rows) {
                        echo ", ";
                        $i = $i + 1;
                      }
                    }
                  }
                  ?>
                ],
                backgroundColor: [
                  <?php
                  for($i = 1; $i <= $num_rows; $i++) {
                    echo "'rgba(255, 99, 132, 0.2)',";
                    echo "'rgba(54, 162, 235, 0.2)'";
                    if($i < $num_rows){
                      echo ",";
                    }
                  }
                  ?>],

                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          }
          else {

            document.write('<canvas id="myChart" width="1200" height="600"></canvas>');
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {

                labels: [
                  <?php
                  while($row = mysqli_fetch_array($result3)){
                    echo "\"" .$row['Year']. "\", ";
                  }
                  ?>],
                  datasets: [{
                    label: 'Number of sets / year',

                    data: [
                      <?php
                      $i = 1;
                      while($row = mysqli_fetch_array($result4)){
                        echo $row['COUNT(Year)'];

                        if($i < $num_rows) {
                          echo ", ";
                          $i = $i + 1;
                        }
                      }
                      ?>
                    ],
                    backgroundColor: [
                      <?php
                      for($i = 1; $i <= $num_rows; $i++) {
                        echo "'rgba(255, 99, 132, 0.2)',";
                        echo "'rgba(54, 162, 235, 0.2)'";
                        if($i < $num_rows){
                          echo ",";
                        }
                      }
                      ?>],

                      borderWidth: 1
                    }]
                  },
                  options: {

                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero:true
                        }
                      }]
                    }
                  }
                });

              }
      </script>

    </article>

    <footer>
      <a>Design by Group 18</a>
    </footer>

  </div>
</body>
</html>
