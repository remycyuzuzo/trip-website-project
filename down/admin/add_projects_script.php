<?php
session_start();
include "session_check.php";

$uploadDir = '../images/thumbnails/';
$response = array(
    'status' => 0,
    'message' => "you don't have permission to submit this data"
);

// If form is submitted
if (isset($_POST['publish'])) {
    // db connect
    include '../includes/db_config.php';

    // Get the submitted form data
    $title = $conn->real_escape_string($_POST['title']);
    $detailed = $conn->real_escape_string($_POST['detailed_project']);
    $sub_title = $conn->real_escape_string($_POST['sub_title']);
    $date = $conn->real_escape_string($_POST['starting_time']);

    // Check whether not empty field submitted
    if (!empty($title)) {

        $uploadStatus = 1;

        // Upload file
        $uploadedFile = '';
        if (!empty($_FILES["thumbnail"]["name"])) {

            // File path config
            $fileType = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
            $fileName = date("dmYHis-") . str_replace(" ", "-", $title) . ".original." . pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
            $targetFilePath = $uploadDir . $fileName;

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to the server
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFilePath)) {
                    $uploadedFile = $fileName;
                } else {
                    $uploadStatus = 0;
                    $response['message'] = 'Sorry, there was an error uploading your file.';
                }
            } else {
                $uploadStatus = 0;
                $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
            }
        }

        if ($uploadStatus === 1) {

            // Insert form data in the database
            $insert = $conn->query("INSERT INTO dvt_projects VALUES ('','$title','$sub_title','$detailed','$uploadedFile','$date')");

            if ($insert) {
                $response['status'] = 1;
                $response['message'] = 'Project saved!';
            } else {
                $response['status'] = 0;
                $response['message'] = '<strong>there was a problem with query</strong><br/>' . mysqli_error($conn);
            }
        } else {
            $response['status'] = 0;
            $response['message'] = '<strong>there was a problem with uploading an image</strong><br/>' . mysqli_error($conn);
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields.';
    }
}

// Return response
if ($response['status'] == 1) {
    $_SESSION['success'] = "the project has been saved successful. It should be visible to website visitors by now";
?>
    <script>
        window.location = "projects.php";
    </script>
<?php
} else if ($response['status'] == 0) {
    $_SESSION['error'] = "There was an error while saving the project. <br>" . $response['message'];
?>
    <script>
        window.location = "add_projects.php";
    </script>
<?php
}
