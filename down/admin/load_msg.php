<?php
if (isset($_POST['msg_id'])) {
    $msg_id = $_POST['msg_id'];
    include "../includes/db_config.php";
    $sql = "SELECT * FROM messages where msg_id=$msg_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="message">
                <div class="message-header justify-content-between d-flex pb-4">
                    <div class="right ">
                        <b>from: </b><?= ($row['sender_name'] != "") ? $row['sender_name'] : "N/A" ?><br>
                        <b>email: </b><?= ($row['sender_email'] != "") ? $row['sender_email'] : "N/A" ?><br>
                        <b>country: </b><?= ($row['sender_country'] != "") ? $row['sender_country'] : "N/A" ?>
                    </div>
                    <div class="left text-right">
                        <b>on</b> <?= ($row['date_sent'] != "") ? $row['date_sent'] : "N/A" ?>
                    </div>
                </div>
                <div class="subject mb-3">
                    RE: <b><?= ($row['subject'] != "") ? $row['subject'] : "N/A" ?></b>
                </div>
                <div class="message-body text-justify">
                    <?= $row['message'] ?>
                </div>
            </div>
    <?php
        }
    } else echo '<h3>this message is\'t available now</h3>';
}

if (isset($_POST['reload'])) {
    include '../includes/db_config.php';
    $query = $conn->query("SELECT * FROM messages");
    $i = 0;
    ?>
    <table class="table table-striped" id="article-table">
        <tr class="thead-dark">
            <th>#</th>
            <th>sender</th>
            <th>Subject </th>
            <th>time</th>
        </tr>
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

<?php
    $i++;
}
