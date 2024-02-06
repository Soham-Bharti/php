<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $skills = $_POST['skills'];
    $skillsString = implode(' ', $skills);

    $dataFile = fopen('data.txt', 'a') or die('Can not open data.txt file');
    fwrite(
        $dataFile,
        "Name: $name \nEmail: $email \nDoB: $dob \nGender: $gender \nSkills: $skillsString\n#######################################\n"
    );
    fclose($dataFile);


    // profile pic upload
    echo "<pre>";
    print_r($_FILES['myFile']);
    echo "</pre>";

    $allowedExt = array('jpg', 'png', 'jpeg', 'pdf');

    foreach ($_FILES['myFile']['tmp_name'] as $key => $val) {
        $file_tmpname = $_FILES['myFile']['tmp_name'][$key];
        $file_name = $_FILES['myFile']['name'][$key];
        $file_size = $_FILES['myFile']['size'][$key];
        $file_error = $_FILES['myFile']['error'][$key];
        $file_type = $_FILES['myFile']['type'][$key];

        $fileExt = explode('.', $file_name);
        $fileActualExt = strtolower(end($fileExt));
        if (in_array($fileActualExt, $allowedExt)) {
            if ($file_error === 0) {
                if ($file_size < 1500000) { // 1300kb 1.5mb = 
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'gallery/' . $fileNameNew;

                    if (!file_exists($file_name)) {
                        if (move_uploaded_file(
                            $file_tmpname,
                            $fileDestination
                        )) {
                            echo "Successfully uploaded your image 
                            " . $_FILES['myFile']['name'][$key] . "<br>";
                        } else {
                            echo "Failed to upload your image";
                        }
                    } else echo "File already exists";
                } else echo "File size is greater than 1.5Mb";
            } else echo "There was some error while uploading";
        } else echo "Format Unsupported";
    }
}
