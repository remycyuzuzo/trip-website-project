<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom-styles.css">
    <title>Register an organization project | TRIP Org</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="index.php">Dashboard</a>
                    <a class="breadcrumb-item" href="projects.php">Projects</a>
                    <span class="breadcrumb-item active">Add an Org Project</span>
                </nav>
            </div>
            <div class="col-md-10">
                <!-- add a post release form -->
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="card card-danger">
                        <div class="card-header">
                            <span class="text-danger">
                                <strong>Error</strong> an internal error occured.
                            </span>
                        </div>
                        <div class="card-body">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']) ?>
                        </div>
                    </div>
                <?php
                }
                if (isset($_SESSION['success'])) {
                ?>
                    <div class="card card-success">
                        <div class="card-header">
                            <span class="text-success">
                                <strong>Success</strong>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="text-success">
                                The project has been siccessful registered. it might be visible to the website visitors.
                            </div>
                            <?php unset($_SESSION['success']) ?>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-title"><i class="fas fa-plus-circle"></i> Register an organization project</div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="form_1" action="add_projects_script.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Project name</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Type in the name of the project">
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Project Title <small>(optional)</small></label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Type in the sub-heading of the projects">
                            </div>
                            <div class="form-group">
                                <label for="detailed_project">Project detailed description</label>
                                <textarea class="form-control" name="detailed_project" id="detailed_project" rows="10" placeholder=""></textarea>
                                <small class="helper-text"><i class="fas fa-question-circle"></i> This document should be written via <b>MS Word</b> and be pasted here afterwards. keep in mind that you will need to re-insert images in this editor.
                                    Select appropriate headings from menu for headers. Format well the document for better content presentation.</small>
                            </div>
                            <div class="form-group">
                                <label for="thumbnail">Title image / Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" placeholder="title image">
                                <small class="helper-text"><i class="fas fa-question-circle"></i>
                                    Select an image which relevant to, and represent the project. <i class="fas fa-exclamation-circle"></i> allowed images are <b>JPG, PNG</b>
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="starting_time">Project starting time</label><br>
                                <small>date the project started or is supposed to start </small>
                                <input type="date" class="form-control" name="starting_time" id="starting_time" placeholder="Type in date the project started or is supposed to start">
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

                            <button type="submit" class="btn btn-primary" style="text-align: right;" name="publish">Publish</button>
                        </form>
                    </div>

                </div>

                <!-- end add release form -->
            </div>
        </div>
    </div>


    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/chkeditor5/build/ckeditor.js"></script>
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
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
                        required: true,
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
                        required: "a thumbnail image is required",
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
</body>

</html>