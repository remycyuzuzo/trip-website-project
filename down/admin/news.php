<?php
session_start();
include "session_check.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Press Releases & Announcements</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Articles</li>
                </ol>
            </div>
            <div class="col-12 mb-3">
                <a href="add-article-form.php" class="btn btn-secondary">
                    add a new article
                </a>
            </div>
            <div class="col-md-12 mt-md-0 mt-2">
                <div class="card">
                    <!-- table card -->
                    <div class="card-header">
                        <h3 class="d-inline-block text-muted" style="text-align: left">all published activities/articles</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        include '../includes/db_config.php';
                        $query = $conn->query("SELECT * FROM articles");
                        $i = 0;
                        if ($query->num_rows > 0) {
                        ?>
                            <input type="text" class="form-control mb-4" placeholder="search.. start typing.." id="search">
                            <table class="table table-striped" id="article-table">
                                <tr class="thead-dark">
                                    <th>#</th>
                                    <th>time</th>
                                    <th>title</th>
                                    <th>Action</th>
                                </tr>
                                <?php

                                while ($row = $query->fetch_assoc()) {

                                ?>
                                    <tr class="data">
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><a href="updatenews.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pencil" aria-hidden="true"></i></a>
                                            <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash" aria-hidden="true"></i></a>
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
                                <p class="lead">all published articles will appear here</p>
                                <p class="lead"><a href="add-article-form.php" class="btn btn-outline-secondary"><i class="fas fa-plus"></i> create a new article</a></p>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div><!-- ./table div -->
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
</body>

</html>