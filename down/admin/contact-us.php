<?php
session_start();
include "session_check.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>Messages</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>
    <div class="container">
        <div class="row my-3">
            <div class="col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Inbox</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <i class="fas fa-question-circle"></i> Please be reminded that this is just a copy of messages sent through the <a href="/contacts">contact us</a> form of the main website.
                <br>The original copy is at your email main inbox
                <p style="font-weight: 700;">To visit your email, <a href="https://webmail.cassidev.org" target="_blank"><u>click here</u> <small><sup><i class="fas fa-external-link-alt"></i></sup></small></a></p>
            </div>
            <div class="col-md-12 mt-md-0 mt-2">
                <div class="card">
                    <!-- table card -->
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" id="btn_reload" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                            <div class="float-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                        <?php
                        include '../includes/db_config.php';
                        $query = $conn->query("SELECT * FROM messages");
                        $i = 0;
                        if ($query->num_rows > 0) {
                        ?><div class="table-responsive mailbox-messages">

                                <table class="table table-striped" id="article-table">
                                    <?php

                                    while ($row = $query->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check1">
                                                    <label for="check1"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-name"><a href="#" data-msg_id="<?= $row['msg_id'] ?>" class="link"><?= $row['sender_name'] ?></a></td>
                                            <td class="mailbox-subject"><b><?= $row['subject'] ?></b> - <?= substr($row['message'], 0, 30) ?>...
                                            </td>
                                            <td class="mailbox-date"><?= $row['date_sent'] ?></td>
                                        </tr>
                                    <?php
                                    }



                                    ?>
                                </table>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="jumbotron text-center">
                                <h3 class="display-3">Nothing's here</h3>
                                <p class="lead">all published articles will appear here</p>
                                <p class="lead"><a href="add-article-form.php" class="btn btn-outline-secondary"><i class="fas fa-plus"></i> create a new article</a></p>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div><!-- ./table div -->
                <!-- /.card -->
            </div>
            <! </div>
        </div>

    </div>
    <!-- mail-preview -->
    <div class="modal fade" id="preview-mail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">mail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="text-center loader py-3">
                    <i class="fas fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- ./mail-preview -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!--    bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--    font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
            $('.link').click(function() {
                $("#preview-mail").modal();
                var id = $(this).data('msg_id');
                console.log(id);
                $.ajax({
                    url: 'load_msg.php',
                    type: 'POST',
                    data: {
                        msg_id: id
                    },
                    success: function(response) {
                        // Add response in Modal body
                        $('#preview-mail .loader').hide();
                        $('#preview-mail .modal-body').fadeIn('fast').html(response);
                    }
                });
                return false;
            });

            $('#btn_reload').click(function() {
                window.location = "";
                return false;
            });
        });
    </script>
</body>

</html>