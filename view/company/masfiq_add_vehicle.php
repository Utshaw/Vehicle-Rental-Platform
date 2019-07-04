
<?php

require_once '../../model/dbconnection.php';
require_once '../../model/dataAccess.php';

require_once "../../controller/company/upload.php";


?>





<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>