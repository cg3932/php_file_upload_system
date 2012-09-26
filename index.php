<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
 
<head> 
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
 
     <title>File Upload Demo</title>
     <link rel="stylesheet" type="text/css" href="uploadify.css" />
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/jquery.min.js"></script> 
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/jquery-ui.min.js"></script> 
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/swfobject.js"></script> 
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/jquery.uploadify.min.js"></script> 
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/sifr.min.js"></script> 
     <script type="text/javascript" src="http://www.uploadify.com/wp-content/themes/uploadify/_scripts/js/sifr-config.js"></script>
     <link rel="stylesheet" type="text/css" href="http://www.uploadify.com/wp-content/plugins/highlight-source-pro/all.css" />
     
</head> 
 
<body>
     <div class="content">
	  <h2>File Upload Demo:</h2> 
	  <script type="text/javascript"> 
	       $(function() {
	       $('#custom_file_upload').uploadify({
	       'uploader'       : 'uploadify.swf',
	       'script'         : 'uploadify.php',
	       'cancelImg'      : 'cancel.png',
	       'folder'         : '/uploads',
	       'multi'          : true,
	       'auto'           : true,
	       'queueID'        : 'custom-queue',
	       'queueSizeLimit' : 5,
	       'simUploadLimit' : 5,
	       'removeCompleted': true,
	       'onSelectOnce'   : function(event,data) {
		   $('#status-message').text(data.filesSelected + ' files have been added to the queue.');
		 },
	       'onAllComplete'  : function(event,data) {
		   $('#status-message').text(data.filesUploaded + ' files uploaded, ' + data.errors + ' errors.');
		 }
	     });});
	  </script>
     
	  <div class="demo-box"> 
	       <div id="custom-queue"></div>
	       <input id="custom_file_upload" type="file" name="Filedata" />
	  </div>
	  
	  <?php
     
	       // open this directory 
		$myDirectory = opendir("uploads");
		
		// get each entry
		while($entryName = readdir($myDirectory)) {
			$dirArray[] = $entryName;
		}
		
		// close directory
		closedir($myDirectory);
		
		// count elements in array
		$indexCount = count($dirArray);
		$displayCount = $indexCount - 2;
     
		echo "<h2>$displayCount File(s) Have Been Uploaded:</h2>";
		echo "<br/>";
		
		// sort 'em
		sort($dirArray);
		
		// print 'em	   
		// loop through the array of files and print them all
		for($index=0; $index < $indexCount; $index++) {
			if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
				print("<a href=\"$dirArray[$index]\">$dirArray[$index]</a>");
				print("\n");
			}
		}
		
		?>
     </div>
</body> 
 
</html>