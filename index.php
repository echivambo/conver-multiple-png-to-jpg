
<!DOCTYPE html>
<html>
<head>
  <title>Run PHP Function</title>
</head>
<body>
  <form method="post" action="functions.php">
    <input type="hidden" name="png_converter" value="pngConerter">
    <button type="submit">Conver to JPG</button>
  </form>
  <br>
  <br>
  
  <form method="post" action="getFileNames.php">
    <input type="hidden" name="get_file_names" value="getFileNames">
    <input type="text" name="file_directory" value="./" placeholder="File directory">
    <input type="text" name="file_extension" value="png" placeholder="File extension">
    <button type="submit">Run Function</button>
  </form>
 
</body>
</html>
