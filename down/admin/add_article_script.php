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
    $body = $conn->real_escape_string($_POST['body']);
    $desc = $conn->real_escape_string($_POST['desc']);

    //default data
    $date = date("y-m-d");
    $time = date("H:i:s");

    // Check whether not empty field submitted
    if (!empty($title)) {

        $uploadStatus = 1;

        // Upload file
        $uploadedFile = '';
        if (!empty($_FILES["thumbnail"]["name"])) {

            // File path config
            $fileName = date("dmYHis-") . str_replace(" ", "-", $title) . ".original." . pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);
            $targetFilePath = $uploadDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

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
            $insert = $conn->query("INSERT INTO articles (thumbnail,title,body,user_id,description) VALUES ('$uploadedFile','$title','$body',$user_id,'$desc')");

            if ($insert) {
                $response['status'] = 1;
                $response['message'] = 'Form data submitted successfully!';
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
    $_SESSION['success'] = "an article was successfully published";
?>
    <script>
        window.location = "add-article-form.php";
    </script>
<?php
} else if ($response['status'] == 0) {
    $_SESSION['error'] = "there was a problem while trying to publish your article! <br>" . $response['message'];
?>
    <script>
        window.history.back();
    </script>
<?php
}
