<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recover Video</title>
</head>

<body>
    
    <?php
    	include("dbconnect.php");
	 ?>
        <h3> <b>You are currently editing: </b> 
        <?php
			$to_be_recovered_name=$_POST['to_be_recovered_name'];
			print  "<i>$to_be_recovered_name</i>";
		?>
		</h3>
        <?php
        
        $result = mysqli_query($conn, "select * from fun_video where title ='$to_be_recovered_name'");
        if ($result)
        {
        list($id, $title, $videolink, $videolength, $highestresolution, $description, $language, $viewcount, $videotype, $iconimage, $tag, $category) = mysqli_fetch_array($result);
             if ($title!=null)
             {
        echo "
        <form method=post action='updatevideo.php'>
        
 		<p>
        	<label for title> Video Title: </label>
            <input type=text name = title value = '$title'/>
        </p>
        
        <p>
        	<label for videolink> Video Link: </label>
            <input type=text name=videolink value='$videolink'/>
        </p>
        
        <p>
           <label for videolength> Video Length: </label>
           <input type = text name=videolength value='$videolength' /> 
        </p>
        
        <p>
            <label for=highestresolution>Highest Resolution: </label>
            <select id = highestresolution name = highestresolution>
                <option value=144 >144p</option>
                <option value=240 >240p</option>
                <option value=360 >360p</option>
                <option value=480 >480p</option>
                <option value=720 >720p</option>
                <option value=1080 >1080p</option>
            </select>
         </p>

         <p>
            <label for='category'>Category: </label>
            <select id = 'category' name = 'category'>";

        echo "<option value='Tae kwon do' ";
        if (strcmp($category,"Tae kwon do") == 0){
            echo "selected";
        }
        echo ">Tae kwon do</option>";

        echo "<option value='Yang Taichi' ";
        if (strcmp($category,"Yang Taichi") == 0){
            echo "selected";
        }
        echo ">Yang Taichi</option>";
        
        echo "<option value='Chen Taichi' ";
        if (strcmp($category,"Chen Taichi") == 0){
            echo "selected";
        }
        echo ">Chen Taichi</option>";

        echo "<option value='Sun Taichi' ";
        if (strcmp($category,"Sun Taichi") == 0) {
            echo "selected";
        }
        echo ">Sun Taichi</option>";

        echo "<option value='Wu Taichi' ";
        if (strcmp($category,"Wu Taichi") == 0){
            echo "selected";
        }
        echo ">Wu Taichi</option>";

        echo "<option value='QiGong' ";
        if (strcmp($category,"Qi Gong") == 0){
            echo "selected";
        }
        echo ">Qi Gong</option>";

        echo "<option value='Shaolin' ";
        if (strcmp($category,"Shaolin") == 0){
            echo "selected";
        }
        echo ">Shaolin</option>";

        echo "<option value='Wing Chun' ";
        if (strcmp($category,"Wing Chun") == 0){
            echo "selected";
        }
        echo ">Wing Chun</option>";

        echo "<option value='Aikido' ";
        if (strcmp($category,"Aikido") == 0){
            echo "selected";
        }
        echo ">Aikido</option>";

        echo "<option value='Judo' ";
        if (strcmp($category,"Judo") == 0) {
            echo "selected";
        }
        echo ">Judo</option>";

        echo "<option value='KungFu Movie' ";
        if (strcmp($category,"KungFu Movie") == 0) {
            echo "selected";
        }
        echo ">KungFu Movie</option>";


        echo "</select>
        </p>
         
         <p>
         	<label for description> Video Description: </label>
            <textarea id=description name=description cols=40 rows=4 >$description</textarea>
         </p>
         
         <p>
         	<label for = language>Language: </label>
            <select id = language name = language>
            	<option value = English>English</option>
                <option value = Non-English>Non-English</option>
            </select>
         </p>
         
         <p>
         	<label for = viewcount>View Count (No Commas): </label>
            <input type = text name = viewcount value = $viewcount />
         </p>
         
         <p>
         	<label for = videotype>Video Type: </label>
           	<input type = checkbox value = tutorial name = videotype[]> Tutorial 
            <input type = checkbox value = entertainment name = videotype[]> Entertainment
            <input type = checkbox value = application name = videotype[]> Application
            <input type = checkbox value = weapon name = videotype[]> Weapon
            <input type = checkbox value = groupdemo name = videotype[]> Group Demo
            <input type = checkbox value = other name = videotype[]> Other
         </p>
         
		 <p>
         	<label for = iconimage>Image Link: </label>
            <input type = text name = iconimage value = $iconimage />
         </p>
         
		 <p>
         	<label for = tag>Tags: </label>
            <input type = text name = tag value = $tag />
         </p>
		
        <input type=hidden name='name_entered' value='$to_be_recovered_name'/>
        <input type=submit name=submit value='Confirm Changes'>
        <input type=reset name=reset value='Start Over'>
        
        </form>";
         mysqli_free_result($result);
             }  // end of inner if
        
         else
        {
        print "<h2>No matching name in the guest book found!</h2>";
         mysqli_free_result($result);
        }
        }//   end of outer if
    ?>
     <input type='button' value='Go back'
                          onclick='self.history.back()' />

    <h2><a href="view.php">Go to Video Website</a></h2>
</body>
</html>
