<?php



// $name = $_FILES["myFile"]["name"];
// $tmp_name = $_FILES["myFile"]["tmp_name"];

// if (move_uploaded_file($tmp_name, $name)) { // // source to destination
//     echo "File uploaded successfully";
// } else echo "File not uploaded";



// Another way...
if (isset($_POST["submit"])) {
    echo "File uploading...<br>";
    $file = $_FILES['myFile'];
    print_r($file); // Array ( [name] => S7.jpeg [full_path] => S7.jpeg [type] => image/jpeg [tmp_name] => D:\Software\XAMPP\tmp\php57A9.tmp [error] => 0 [size] => 28655 )

    $fileName = $_FILES['myFile']['name'];
    $fileTmpName = $_FILES['myFile']['tmp_name'];
    $fileSize = $_FILES['myFile']['size'];
    $fileError = $_FILES['myFile']['error'];
    $fileType = $_FILES['myFile']['type'];


    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension)); // jpeg

    $allow = array('jpeg', 'jpg', 'png', 'pdf');
    if (in_array($fileActualExtension, $allow)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) { // 500000kb = 500mb
                $fileNameNew = uniqid('', true) . "." . $fileActualExtension; // new unique name for the uploaded file (eg. 65c1d7b3ba4477.76805219.jpg)

                $fileDestination = 'uploads/' . $fileNameNew;
                // $fileName = 'uploads/'."$fileName"; // file upload with same nmae

                if (move_uploaded_file(
                    $fileTmpName,
                    $fileName
                )) {
                    echo "Successfully uploaded your image";
                    header("Location: index.html ? upload successful");
                } else {
                    echo "Failed to upload your image";
                }
            } else {
                echo "Can't Too large file!";
            }
        } else {
            echo "There was an error uploading the file";
        }
    } else {
        echo "You can not upload files of this type!";
    }
} else {
    echo "Something went wrong";
}
