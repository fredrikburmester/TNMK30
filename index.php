<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>

<div class="grid">
  <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>
  <header class="headerright"><a href="blog.php">GROUP 18</a></header>

  <!--This site utilizes css grids-->
  <article>
      <div class="titles">
        <h1>LEGO</h1>
        <h2><em>A Database full of Lego Sets and Parts</em></h2><br>
        <p>The main goal is to create a responsive, nice looking website that will host a database where you can search for Lego sets and show what's inside that set. </p>
        <!--Christmas Joke

            <p>He's making a database. He's sorting it twice.<br>
            SELECT * FROM Contacts WHERE behaviour = 'nice'<br>
            SQL Clause is coming to town!</p>

        -->
      </div>
      <div class="line"><hr></div>
      <!--Searchbar-->
      <div class="search">
        <form action="setsview.php" class="container-1">
          <span class="icon"><i class="fa fa-coffee"></i></span>
          <input required type="search" id="search" name="search" autocomplete="off" placeholder="Search Sets..."/>
        </form>
      </div>

        <button class="button"><a href="statsmainpage.php"><i class="fa fa-bar-chart"></i> Statistics<a/></button>
      <!--<img src="Computer.png" alt="">-->
  </article>

  <footer>
    <a>Design by Group 18</a>
  </footer>

</div>
</body>
</html>
