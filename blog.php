<!--Establihes a connection to the database-->
<?php include_once "connection.php"; ?>
<!--Including all headerfiles, this is included in all files-->
<?php include("header.html"); ?>

  <link rel="stylesheet" href="css/blog.css">
</head>
<body>

<div class="grid">
  <header class="headerleft"><a href="index.php"><i class="fa fa-bookmark" aria-hidden="true"></i> HOME</a></header>
  <header class="headerright"><a href="blog.php">GROUP 18</a></header>

  <!--This site utilizes css grids-->
  <article>
      <div class="titles">
        <h1>BLOG</h1>
        <h2><em>This is a page of <span style="color: #EF5350">progress and group info</span></em></h2>
        <h3></h3>
      </div>
      <div class="members">
        <h3>Group 18:</h3>
          <p>
          - Fredrik<br>
          - Linus<br>
          - Ludde<br>
          - Erik<br><br>
        </p>
      </div>
      <div class="divId"><p><hr></p></div>

      <!--Group 18 documented all significant changes done to the site-->
      <div class="blogpost">
        <h2>Official launch of the website.</h2>
        <p>
         This is the website for our project in the course 'Electonical Publishing' at Norrköping University in Sweden. The main goal is to create a responsive, nice looking website that will host a database with some functionality. <br><br>
         We re-built and re-designed the entire website and based it on CSS grids, for a more responsive website.
        <br><br>
        <span style="color: #1115">November 29th 2017</span>
        </p><hr>

        <p>Signed up our group for the project throgh website and email. We are a group of 4 people, names at the top.
        <br><br>
        <span style="color: #1115">November 30th 2017</span>
        </p><hr>

        <p>Color coordinated the website. We chose a light red color. <br><br>
        <span style="color: #1115">December 2nd 2017</span>
        </p><hr>

        <p>Added break lines. Changed font. Changed back background colors to white. Added "objects found" in the database results.<br><br>Added a 1000 object limit to "Show all" button.<br><br>
        <span style="color: #1115">December 3rd 2017</span>
        </p><hr>

        <h2>Query Strings</h2>
        <p>Added links to sets in database. Using query strings to load the correct set on a new page, as well as the title. Decided it would be too much on one page with everything. Then a problem occured where the query string was reset when searching in a set. Found a workaround using cookies to save the query string.<br><br>
        Had some problems with not being able to use cookies on first load of the page (needed a reload to work - that's just how cookies work). Found a workaround.<br><br> Made the entire row of sets clickable instead of just the text, with the correct cursor aswell.<br><br>
        <span style="color: #1115">December 8th 2017</span>
        </p><hr>

        <h2>Image Problems</h2>
        <p>
        Added images to parts in sets.<br>The ImageIDs are not matching up with the images on the website though. /P containes all images but the ItemID is not correct. Need to ask for another database.
        <br>Made Search work inside parts. And showing total amounts of parts in a set in the title. <br><br>Looked into Swedish copyright law.<br><br>
        <span style="color: #1115">December 9th 2017</span><br><br>
        <span style="color:red">
        Edit: After a lot of learning about SQL and some quite important info i realised that some sets from 'sets' does not contain any parts. This is what caused all issues with the images. I am linking the images in a weird was now, from the images table. But that is something that i will have to change later. Everything is working as expected.<br><br></span>
        <span style="color: #1115">December 18th 2017</span><br><br>
        </p><hr>

        <h2>Meeting and future priorities and prosess</h2>
        <p>Changed search icon to coffee cup.
            Went through the webside looking for things to improve. <br><br>
            - Less padding<br>
            - Sort by pressing table titles<br>
            - Website title and logo<br>
            - 'Go to top' icon<br>
            - "No Result" if no rows in table<br>
            - Cookie alert<br>
            - Limit 100 everywhere<br>
            - Compiling navbar into one css file (Header)<br>
            - Sorting via table titles<br>
            - Make it work in safari<br>
            - Autoselect search field<br>
            - No css in html<br>
            - Special characrets in search<br>
            - Small screen fix<br>
            - "This set was updated" and the correct year<br>
            - Change to SetID sort<br>
            - Go to next page in table list<br>
            - Include header.php in every document<br><br>
          <span style="color: #1115">December 11th 2017</span>
          </p><hr>


          <p>Autofocus on the searchfield<br>
          Compiling css code into separate files<br>
          Pressing a lego piece brings up more info<br><br>
          A cookie popup for the website - taken from a third party. <strong>Remebmer to disclose this in the report.</strong>
          <span style="color: #1115">December 14th 2017</span>
          </p><hr>


          <h2>Oops!</h2>
          <p>Entire project was accedentally overwritten but was luckely restored thanks to Crystone daily backup.<br>
              <br>
              Pressing a lego piece brings up more info acctually works now. Planning on including all sets for which the part is present in. <br><br>
          <span style="color: #1115">December 15th 2017</span>
          </p><hr>

          <p>Added a loading screen. This loads once every 4min with the help of cookies and a clever if statement.<br>
              <br>
              Added color to the title in index<br>
              <br>
              Added fades with css anomations to the searchbar. This was a conscious decition based on the belief that the user will focus there, as intended. This also replaces the autofocus on the searchbar. <br><br>
          <span style="color: #1115">December 16th 2017</span>
          </p><hr>

          <p>Playing around with the idea of sorting via the table headings. Example in Uppgift 6<br><br>
          <span style="color: #1115">December 17th 2017</span>
          </p><hr>

          <h2>New Design!</h2>
          <p>Making a new design for the website. This includes: <br><br>
            - Looking into usability and easiness of the website. What the user actually focuses on when using the website.<br>
            - New nice titles and shadows.<br>
            - Moving lines and nice icons. <br>
            - Simpler design. <br>
            - Everything still links properly to the old site. <br><br>
          Thinking i might remove the intro screen for the last index site, that became a bit annoying, even though it was a nice experiment.<br><br>
          Implemented the sorting in titles proparly for the Setname collumn.<br><br>
          Found out that some sets does not have parts in them, and the sets are therefore not mentioned in the inventory table. This was very annoying since i though that some sets were missing from the entire inventory table. This caused a lot of problems with printing out parts in a set since i took big leaps around what i thought was the problem.<br><br>
          <span style="color: #1115">December 18th-23rd 2017</span>
          </p><hr>

          <p>Continuing on the new design and more pages<br><br>
            - New cool titles<br>
            - Made everything work as expected<br>
            - Included partsearch and made everything more efficient<br>
            - Still need to to the part specific page <br>
            - Better design for smaller screens<br>
            - Included "No result" fallbacks everywhere<br>
            - Improved the design of the blog<br>
            - Made the nav-bar sticky<br>
            - Removed color from table body<br>
            - Added 'You searched for' subtitle<br>
            - Nav-bar icons now have a faint white glow<br>
            - Asked for input by relatives and made changes acordingly<br><br>
          Thinking if the blog should be its own database to i don't have to go and to a post by writing in code<br><br>
          <span style="color: #1115">December 24rd 2017</span>
          </p><hr>

          <p>Included a funny christmas joke on the startpage.<br><br>
          <span style="color: #1115">December 25th 2017</span>
          </p><hr>

      </div>
  </article>

  <footer>
    Design by Group 18
  </footer>

</div>

</body>
</html>
