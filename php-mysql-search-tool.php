<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .body{
        left:100px;
        right:100px;
    }
    .container{
    border: 5px solid black;
    background:white;
    height:auto;
    width:800px;
    margin: 0 auto;
    padding-left:100px;
    padding-right:100px;
}

table.display {
    border-collapse: collapse;
}
tr:nth-child(even){
    background:  #e7efef;
}
select {
  width: 100px;
  padding: 1px 1px;
  border: none;
  background-color: #f1f1f1;
  -moz-appearance: none;
}

input[type=submit]{
background-color: #277e82;
  color: white;
  border: none;
  padding: 2px 10px;
  cursor: pointer;
}

input[type=text]{
    margin: 5px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

div.posta a:link{text-decoration: none; color:  #1e8ebb ;}
div.posta a:visited{text-decoration: none; color:   #1e8ebb  ;}
div.posta a:hover{text-decoration-line: underline; color:   #1e8ebb  ;}
    
</style>
</head>

<body>
    <div class="container">
        <center> <img src="health.png" width=auto height=100px;></center>
        <div class="content">
           <h1>MY POSTS</h1>
            
            <p>Below are my articles on financial analysis, information technology, and general topics in business analysis and time management. All posts will be arranged in chronological order. You can search my articles by titles, months, and/or years. All posts are stored in PDF format and therefore you can download my articles from this webpage. </p>
            
          <a href="https://lizhaozhi.000webhostapp.com/financial-analysis.html">Work Samples in Financial Analysis </a>
   &nbsp; | &nbsp;
            <a href="https://lzzapp.blogspot.com/" target="_blank">Portfolio</a>
            &nbsp; | &nbsp;
        <a href="https://lizhaozhi.000webhostapp.com/post.php">Posts </a>

            <br><br><br>
            
            <a href="resume.pdf" target="_blank">My Resume</a> Last Updated: March 15, 2020 (Chicago Time)
           
           <br><br>
            
            <div style="padding-left: 100px; background-color: lightgrey; height: 30px; position: relative;">
            <form name="postlist" action="post.php" method="post">
            	Search Title <input type="text" name="title">
            	<input type="submit" name="search" value="Search" size=10>
            	<select name="month" width=150px;>
            	    <option value="Month">Month</option>
            	    <option value="January">January</option>
            	    <option value="February">February</option>
            	    <option value="March">March</option>
            	    <option value="April">April</option>
            	    <option value="May">May</option>
            	    <option value="June">June</option>
            	    <option value="July">July</option>
            	    <option value="August">August</option>
            	    <option value="September">September</option>
            	    <option value="October">October</option>
            	    <option value="November">November</option>
            	    <option value="December">December</option>
            
            	</select>
            	<select name="year" width=150px;>
            	    <option value="Year">Year</option>
            	    <option value="2020">2020</option>
            
            	</select>
            </form>
            </div>

            <?php
            $myUserName = "id11857721_myarticles";
            $myPassword = "lizhaozhi";
            $myLocalHost = "localhost";
            $myDB = "id11857721_myarticles";
            
            $conn = mysqli_connect($myLocalHost, $myUserName, $myPassword, $myDB);
            if(!$conn){
            	die("Connection failed: ");
            }
            else if(isset($_POST['search'])){
            	$titlesearch = trim($_POST['title']);
            	$monthsearch = trim($_POST['month']);
            	$yearsearch = trim($_POST['year']);
            	
            	//display everything
            	$query = "SELECT * FROM posts WHERE 1";
            
                //user selection: search by title
            	if(!$titlesearch==""){
            		$query = $query." AND post_title LIKE '%$titlesearch%'";
            	}
            	
            	//search by month
            	if($monthsearch!="" && $monthsearch!="Month"){
            	    $query = $query." AND pub_month = '$monthsearch'";
            	}
            	
            	//search by year
            	if($yearsearch!="" && $yearsearch!="Year"){
            	    $query = $query." AND pub_year = '$yearsearch'";
            	}
            
            
            	$query = $query. " ORDER BY post_id DESC";
                $result = mysqli_query($conn, $query);
            	if(!$result){
            		die("Cannot process the query");
            	}
            
            	
            	//notice
            	
            	//if only month search
            	if($monthsearch!="" && $monthsearch!="Month" && $yearsearch!="" && $yearsearch!="Year"){
            	    echo "<p><b>".$monthsearch." ".$yearsearch."</b></p><br>";
            	}
            	else if($monthsearch=="Month" && $yearsearch=="Year"){
            	    echo "<p><b>All Posts</b></p><br>";
            	}
            	else if($monthsearch!="" && $yearsearch=="Year"){
            	    echo "<p><b> Showing ".$monthsearch."</b></p><br>";
            	}
                else if($yearsearch!="" && $monthsearch=="Month"){
            	    echo "<p><b> Showing ".$yearsearch."</b></p><br>";
                }
            
            	
            	$num = mysqli_num_rows($result);
            	if($num > 0){
            	    echo '<div class="posta">';
            		echo '<table border="0" width=100% class="display"><tr style="background-color:  #277e82;">';
            		echo "<td width=20% style='color: white;'>DATE</td>";
            		echo "<td width=80% style='color: white;'>TITLE</td>";
            		echo "</tr></td></tr>";
            		while($row=mysqli_fetch_assoc($result)){
            			$id = $row["post_id"];
            			echo "<td>".$row["pub_date"]."</td>";
            			echo '<td><a target="_blank" href='.$row['post_url'].'>'.$row['post_title'].'</a></td>';
                        echo "</tr>";
            		}	
            		echo "</table>";
            		echo '</div>';
            
            	}
            	else if($titlesearch=="" && $monthsearch!="Month" && $yearsearch!="Year"){
            		echo "No record found";
            	}
            	else if($titlesearch!="" && $monthsearch=="Month" && $yearsearch=="Year"){
            		echo "No record matches &quot;".$titlesearch."&quot; in the database. Please check your query carefully";
            	}
            	else if($titlesearch!="" && $monthsearch!="Month" && $yearsearch!="Year") {
            	    echo "No record maches &quot;".$titlesearch."&quot; in ".$monthsearch." ".$yearsearch.". Please check your query carefully.";
            	}
            	else if($titlesearch!="" && $monthsearch!="" && $monthsearch!="Month" && $yearsearch=="Year"){
            	    echo "No record maches &quot;".$titlesearch."&quot; in ".$monthsearch." ".". Please check your query carefully.";
            	}
            	else if($titlesearch!="" && $yearsearch!="" && $yearsearch!="Year" && $monthsearch=="Month"){
            	    echo "No record maches &quot;".$titlesearch."&quot; in ".$yearsearch." ".". Please check your query carefully.";
            	}
            	else if ($titlesearch=="" && $monthsearch!="" && $monthsearch!="Month" && $yearsearch=="Year"){
            	    echo "No record found";
            	}
            	else if ($titlesearch=="" && $yearsearch!="" && $yearsearch!="Year" && $monthsearch=="Month"){
            	    echo "No record found";
            	}
            }
            
            //By default display, all variables from the database in chronological order.
            else{
            	$query = "SELECT * FROM posts WHERE 1 ORDER BY post_id DESC";
            	
            	$result = mysqli_query($conn, $query);
            	if(!$result){
            		die("Cannot process the query");
            	}
            	
            	echo "<p><b> All Posts </b></p><br>";
            	
            	$num = mysqli_num_rows($result);
            	if($num > 0){
            	    echo '<div class="posta">';
            		echo '<table border="0" width=100% class="display"><tr style="background-color:  #277e82;">';
            		echo "<td width=20% style='color: white;'>DATE</td>";
            		echo "<td width=80% style='color: white;'>TITLE</td>";
            		echo "</tr></td></tr>";
            		while($row=mysqli_fetch_assoc($result)){
            			$id = $row["post_id"];
            			echo "<td>".$row["pub_date"]."</td>";
            			echo '<td><a target="_blank" href='.$row['post_url'].'>'.$row['post_title'].'</a></td>';
                        echo "</tr>";
            		}	
            		echo "</table>";
            		echo '</div>';
            	}
            	else{
            		echo "No record found";
            	}
            }
            
            mysqli_close($conn);
            
            ?>
            <br><br>
            
        </div>
        <div class="footer">
            <center>Follow me on <a href="https://www.linkedin.com/in/lizhaozhi" target="_blank">LinkedIn</a> and
            <a href="https://github.com/mrlizhaozhi" target="_blank">GitHub</a></center>
            <center><p>Copyright &copy; 2020 - The Official Homepage of Li Zhaozhi </p>
            <P>李兆智的官方主页</P></center>
        </div>
    </div>
</body>
</html>
