<?php
session_start();
include "session_check.php";
include "../includes/db_config.php";

// functions
function updateProject($id)
{
    include "../includes/db_config.php";
    $sql = "SELECT * FROM dvt_projects where proj_id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
    <div class="card card-secondary">
        <div class="card-header">
            <div class="card-title"><i class="fas fa-plus-circle"></i>edit this project</div>
        </div>
        <div class="card-body">
            <form method="post" id="form_1" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Project name</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= $row['proj_title'] ?>" placeholder="Type in the name of the project">
                </div>
                <div class="form-group">
                    <label for="sub_title">Project Title</label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Type in the sub-heading of the projects" value="<?= $row['proj_subtitle'] ?>">
                </div>
                <div class="form-group">
                    <label for="detailed_project">Project detailed description</label>
                    <textarea class="form-control" name="detailed_project" id="detailed_project" rows="10" placeholder=""><?= $row['project_essay'] ?></textarea>

                </div>
                <div class="form-group">
                    <label for="thumbnail">Title image / Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" id="thumbnail" placeholder="title image">
                    <small class="helper-text"><i class="fas fa-question-circle"></i>
                        leave it empty if you don't wish to change the thumbnail. <i class="fas fa-exclamation-circle"></i> allowed images are <b>JPG, PNG</b>
                    </small>
                </div>
                <div class="form-group">
                    <label for="starting_time">Project starting time</label><br>
                    <small>date the project started or is supposed to start </small>
                    <input type="date" class="form-control" name="starting_time" value="<?= $row['date_started'] ?>" id="starting_time" placeholder="Type in date the project started or is supposed to start">
                    <small class="helper-text"><i class="fas fa-question-circle"></i>
                        leave it empty if you don't wish to change the date.
                    </small>
                </div>
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <p class="form-text">
                        <?php echo $_SESSION['message'];
                        unset($_SESSION['message']); ?>
                    </p>
                <?php
                }
                ?>

                <button type="submit" class="btn btn-primary" name="publish">Update</button>
            </form>
        </div>

    </div>


<?php
}

function upload_image_code($title)
{
    $uploadDir = '../images/thumbnails/';
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

?>
<!doctype html>
<html lang="en">

<head>
    <title>Update <?= $_GET['update'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/images/trip favicon 256x256.png" type="image/x-icon">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom-styles.css">
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </div>
            <div class="col-12 mb-3">
                <a href="add_projects.php" class="btn btn-secondary">
                    Register a project
                </a>
            </div>
            <div class="col-md-12 mt-md-0 mt-2">
                <?php
                if (isset($_SESSION['success'])) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success</strong>
                        Your changes has been published!
                        <?php unset($_SESSION['success']) ?>
                    </div>
                <?php
                }
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="alert alert-error">
                        <strong>Error</strong>
                        there was an error, Report using this error text: <span class="text-danger"><?= $_SESSION['error'] ?></span>.
                        <?php unset($_SESSION['error']) ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($_GET['update'])) {
                    switch ($_GET['update']) {
                        case 'project':
                            $id = "$_GET[ProjectId]";
                            updateProject($id);
                            break;
                        case 'user':
                            # code...
                            break;
                        case 'article':
                            # code...
                            break;

                        default:
                            # code...
                            break;
                    }
                }
                ?>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

    <script src="../admin/files/ckfinder/ckfinder.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#detailed_project'), {

                toolbar: {
                    items: [
                        'heading', 'bold', 'italic', 'link', 'fontColor', 'underline', 'fontBackgroundColor', 'fontFamily', 'subscript', 'superscript', 'strikethrough', 'fontSize', 'bulletedList', 'numberedList', '|', 'indent', 'outdent', '|', 'ckfinder', '|', 'specialCharacters', 'blockQuote', 'insertTable', 'horizontalLine', 'mediaEmbed', 'undo', 'redo', 'pageBreak'
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells', 'tableCellProperties', 'tableProperties'
                    ]
                },
                licenseKey: '',

            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something gone wrong!');
                console.error('Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:');
                console.warn('Build id: axjvsgp2i9e-8yoa23e6tkpz');
                console.error(error);
            });
    </script>
    <!-- Form validation -->
    <script>
        $(document).ready(function() {
            $('#form_1').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    thumbnail: {
                        accept: "image/*",
                    },
                    detailed_project: {
                        required: true,
                    }
                },
                messages: {
                    title: {
                        required: "the title is required.",
                    },
                    thumbnail: {
                        accept: "please enter a valid image file",
                    },
                    detailed_project: {
                        required: "your content is required",
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


    <?php

    // If form is submitted
    if (isset($_POST['publish'])) {
        // db connect
        include '../includes/db_config.php';
        // PHP SCRIPTS
        $response = array(
            'status' => 0,
            'message' => "you don't have permission to submit this data"
        );
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
                upload_image_code($title);
                if ($uploadStatus === 1) {

                    // Insert form data in the database
                    $insert = $conn->query("UPDATE dvt_projects SET proj_title='$title',proj_subtitle='$sub_title',project_essay='$detailed',date_started='$date', proj_thumbnail='$uploadedFile' where proj_id=$id");

                    if ($insert) {
                        $response['status'] = 1;
                        $response['message'] = 'Project saved!';
                    } else {
                        $response['status'] = 0;
                        $response['message'] = '<strong>there was a problem with query</strong><br/>' . $conn->error;
                    }
                } else {
                    $response['status'] = 0;
                    $response['message'] = '<strong>there was a problem with uploading an image</strong><br/>' . $conn->error;
                }
            } else {
                $insert = $conn->query("UPDATE dvt_projects SET proj_title='$title', proj_subtitle='$sub_title', project_essay='$detailed', date_started='$date' where proj_id=$id");
                if ($insert) {
                    $response['status'] = 1;
                    $response['message'] = 'changes saved!';
                } else {
                    $response['status'] = 0;
                    $response['message'] = '<strong>there was a problem with query</strong> noimage<br/>' . $conn->error;
                }
            }
        } else {
        }
        // Return response
        if ($response['status'] == 1) {
            $_SESSION['success'] = "The project was updated, your changes are live now.";
    ?>
            <script>
                window.location = "";
            </script>
        <?php
        } else if ($response['status'] == 0) {
            $_SESSION['error'] = "There was an error while saving the project. <br>" . $response['message'];
        ?>
            <script>
                window.location = "";
            </script>
    <?php
        }
    }

    ?>
</body>

</html>