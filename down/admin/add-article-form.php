<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add an article | TRIP Org</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="index.php">Dashboard</a>
                    <a class="breadcrumb-item" href="news.php">Articles</a>
                    <span class="breadcrumb-item active">Add an article</span>
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
                                an article has been published successfully. it is now visible to the end users.
                            </div>
                            <?php unset($_SESSION['success']) ?>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="card card-secondary">
                    <div class="card-header">
                        <div class="card-title"><i class="fas fa-plus-circle"></i> post an announcement</div>
                    </div>
                    <div class="card-body">
                        <form method="post" id="form_1" action="add_article_script.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="add the title which will appear on visitors">
                            </div>
                            <div class="form-group">
                                <label for="editor">write an article here</label>
                                <textarea class="form-control" name="body" id="editor" rows="10" placeholder="a detailed article goes here. use tools available to make texts look attractive"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="doc">title image / thumbnail</label>
                                <div class="border">
                                    <label class="custom-file">
                                        <div class="p-2">
                                            <i class="fas fa-cloud-upload-alt"></i> Click to browse an image (jpg,png,jpeg,..)
                                            <input type="file" name="thumbnail" id="thumbnail" placeholder="title image" class="custom-file-input" aria-describedby="fileHelpId">

                                            <span class="custom-file-control"></span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="texts that visitors will be able to view even before opening the document"></textarea>
                                </div>
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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.8.2/tinymce.min.js" integrity="sha512-laacsEF5jvAJew9boBITeLkwD47dpMnERAtn4WCzWu/Pur9IkF0ZpVTcWRT/FUCaaf7ZwyzMY5c9vCcbAAuAbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#editor',
    mode : "textareas",
    toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
  plugins: 'code preview table style advimage',
  theme_advanced_buttons3_add : "preview",
  plugin_preview_width : "500",
  plugin_preview_height : "600",
  theme_advanced_buttons3_add : "tablecontrols",
  table_styles : "Header 1=header1;Header 2=header2;Header 3=header3",
  table_cell_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Cell=tableCel1",
  table_row_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
  table_cell_limit : 100,
  table_row_limit : 5,
  table_col_limit : 5,
  theme_advanced_buttons3_add : "styleprops"
  });
  </script>
    <!-- Form validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js" integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    body: {
                        required: true,
                    },
                    desc: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "the title is required.",
                    },
                    thumbnail: {
                        required: "please provide the post title image, this will attract users to view the article",
                        accept: "please enter a valid image file",
                    },
                    body: {
                        required: "your contents is required",
                    },
                    desc: {
                        required: "please describe what is this article about briefly."
                    }
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