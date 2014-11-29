<?php
/* File   : upload.php
   Subject: CS174 demo
   Authors: Chris Tseng
   Version: 1.0
   Date   : Nov 1, 2014
   Description: A web form that collects users' data to write into the guestbook database table
*/
include("dbconnect.php"); ?>

<h2>Upload Your Video</h2>

 <form method="post" action="create_entry.php">
 
 		<p>
        	<label for "title"> Video Title: </label>
            <input type ="text" name = "title"/>
        </p>
        
        <p>
        	<label for "videolink"> Video Link: </label>
            <input type = "text" name = "videolink"/>
        </p>
        
        <p>
           <label for "videolength"> Video Length: </label>
           <input type = "text" name = "videolength" /> 
        </p>
        
        <p>
            <label for="highestresolution">Highest Resolution: </label>
            <select id = "highestresolution" name = "highestresolution">
                <option value="144" >144p</option>
                <option value="240" >240p</option>
                <option value="360" >360p</option>
                <option value="480" >480p</option>
                <option value="720" >720p</option>
                <option value="1080" >1080p</option>
            </select>
         </p>
         
         <p>
         	<label for "description"> Video Description: </label>
            <textarea id="description" name="description" cols="40" rows="4" class="field-large"></textarea>
         </p>
         
         <p>
         	<label for = "language">Language: </label>
            <select id = "language" name = "language">
            	<option value = "english">English</option>
                <option value = "nonenglish">Non-English</option>
            </select>
         </p>
         
         <p>
         	<label for = "viewcount">View Count (No Commas): </label>
            <input type = "text" name = "viewcount" />
         </p>
         
         <p>
         	<label for = "videotype">Video Type: </label>
           	<input type = "checkbox" value = "tutorial" name = "videotype[]"> Tutorial 
            <input type = "checkbox" value = "entertainment" name = "videotype[]"> Entertainment
            <input type = "checkbox" value = "application" name = "videotype[]"> Application
            <input type = "checkbox" value = "weapon" name = "videotype[]"> Weapon
            <input type = "checkbox" value = "groupdemo" name = "videotype[]"> Group Demo
            <input type = "checkbox" value = "other" name = "videotype[]"> Other
         </p>
         
		 <p>
         	<label for = "iconimage">Image Link: </label>
            <input type = "text" name = "iconimage" />
         </p>
         
		 <p>
         	<label for = "tag">Tags: </label>
            <input type = "text" name = "tag" />
         </p>
<input type=submit name=submit value="Upload">
</form>

