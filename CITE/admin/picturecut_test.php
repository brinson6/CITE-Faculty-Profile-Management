<!DOCTYPE html>
<html lang="en-US" enctype="UTF-8">
	<head>
		<title>Testing Picture Upload</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> <!--for bootstrap theme-->    
 
	</head>
	<body>
		    
            <script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
        
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script><!--for bootstrap theme-->    
            <script	src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="			  crossorigin="anonymous"></script>

              
            <script src="includes/jquery-picture-cut/src/jquery.picture.cut.js"></script>    
        <div id="container_image">
        	

        </div>        
        <script>
        	$("#container_image").PictureCut({
                  InputOfImageDirectory       : "image",
                  PluginFolderOnServer        : "cite/admin/includes/jquery-picture-cut/",
                  FolderOnServer              : "/cite/admin/assets/uploads/",
                  EnableCrop                  : true,
                  CropWindowStyle             : "Bootstrap"
              });
        </script>
</body>
</html>