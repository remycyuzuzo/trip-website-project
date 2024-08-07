<?php
session_start();
include "session_check.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Organization Projects</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom-styles.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
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
                        The project has been siccessful registered. it might be visible to the website visitors.
                        <?php unset($_SESSION['success']) ?>
                    </div>
                <?php
                }
                ?>
                <div class="card">
                    <!-- table card -->
                    <div class="card-header">
                        <h3 class="d-inline-block text-muted" style="text-align: left">Projects</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        include '../includes/db_config.php';
                        $query = $conn->query("SELECT * FROM dvt_projects");
                        $i = 0;
                        if ($query->num_rows > 0) {
                        ?>
                            <input type="text" class="form-control mb-4" placeholder="search.. start typing.." id="search">
                            <table class="table table-striped projects" id="article-table">
                                <tr class="thead-dark">
                                    <th>#</th>
                                    <th>title</th>
                                    <th>Date started</th>
                                    <th></th>
                                </tr>
                                <?php

                                while ($row = $query->fetch_assoc()) {

                                ?>
                                    <tr class="data">
                                        <td><?php echo ++$i ?></td>
                                        <td><?= $row['proj_title'] ?></td>
                                        <td><?= $row['date_started'] ?></td>
                                        <td class="actions"><a href="update.php?update=project&ProjectId=<?= $row['proj_id'] ?>">Edit |</a>
                                            <a href="javascript:" data-projid="<?= $row['proj_id'] ?>" class="link"> delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }



                                ?>
                            </table>
                        <?php
                        } else {
                        ?>
                            <div class="jumbotron">
                                <h3 class="display-3">Nothing here</h3>
                                <p class="lead">projects will be displayed here</p>
                                <p class="lead"><a href="add_projects.php" class="btn btn-outline-secondary"><i class="fas fa-plus"></i> Start a new project</a></p>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div><!-- ./table div -->
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteDialogbox">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirm deletion</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h3>do you really want to delete this project? </h3>
                    <h4>this is irreversable</h4>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger deleteBtn">Yes</a>
                    <a class="btn btn-link" data-dismiss="modal">No, close</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.link').click(function() {
                var id = $(this).data('projid');
                console.log(id);
                $('.deleteBtn').attr('href', 'delete.php?delete=project&deleteProjectId=' + id);
                $("#deleteDialogbox").modal();
                return false;
            });
        });
    </script>
</body>

</html>