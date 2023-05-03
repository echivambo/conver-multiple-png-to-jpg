<?php
if (!function_exists($_POST['get_file_names']))
  redirectUser();

  // Get the name of the function to run
  $functionName = $_POST['get_file_names'];
  //$fileDirectory = $_POST['file_directory'];

  // Call the function using call_user_func
  if (function_exists($functionName)) {
    call_user_func($functionName);
  } else {
    echo "Function not found: $functionName";
  }

// Redirect the user to a new page
  function redirectUser(){
    header("Location: index.php");
    exit;
  }

  function getFileNames(){
    // Define the directory path to search for PNG files
    $directory = $_POST['file_directory'];
    $file_extension = $_POST['file_extension'];

    // Get a list of all files in the directory
    $fileList = scandir($directory);

    // Initialize an array to store the PNG file names
    $pngFiles = array();

    // Loop through each file in the directory
    foreach ($fileList as $file) {
      // Check if the file is a PNG file
      if (pathinfo($file, PATHINFO_EXTENSION) == $file_extension) {
        // Add the file name to the PNG file array
        $pngFiles[] = $file;
        print_r($file."<br>");
      }
    }

    echo "<br>";
    echo '<a href="./index.php">Go back</a>';
    // Output the PNG file names
    return($pngFiles);
  }
?>