<!-- Status Modal -->
<?php include("connection/connect.php"); ?>
<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                $trackingnumber = $_GET["trackingnumber"];

                //Select tracking number id
                $sqldoc_track = "select document.document_id FROM document,tracking_number WHERE document.tracking_number_id = tracking_number.tracking_number_id and tracking_number.tracking_number = '$trackingnumber'";
                $doc_track = mysqli_query($db, $sqldoc_track);
                $rowdoc_track = mysqli_fetch_array($doc_track);
                $doc_trackingnumber = $rowdoc_track["document_id"];
                $document_id = $doc_trackingnumber;
                ?>

                <form action="document-history.php?trackingnumber=<?php echo $trackingnumber ?>" method="post">
                    <div class="form-group">
                        <label for="status-name" class="col-form-label">Status:</label>
                        <select name="update_status" class="form-control custom-select" data-placeholder="Select Status" tabindex="1">

                            <?php
                            $sql_my_docs_history_status_modal = "select transaction_history.latest_status_id FROM transaction_history WHERE transaction_history.document_id = $document_id ORDER BY transaction_history.transaction_history_id DESC LIMIT 1;";
                            $query_my_docs_history_status_modal = mysqli_query($db, $sql_my_docs_history_status_modal);
                            $rows_my_docs_history_status_modal = mysqli_fetch_array($query_my_docs_history_status_modal);
                            $rows_my_docs_history_status_modal['latest_status_id'];
                            $latest = $rows_my_docs_history_status_modal['latest_status_id'];

                            // if ($latest == 3) {
                            //     $sqlstatus = "select * FROM status where status_id IN (4)";
                            // } else if ($latest == 4) {
                            //     $sqlstatus = "select * FROM status where status_id IN (3)";
                            // } else {
                            $sqlstatus = "select * FROM status where status_id IN (3,4)";
                            // }
                            $status = mysqli_query($db, $sqlstatus);
                            while ($rowstatus = mysqli_fetch_array($status)) {
                                echo ' <option value="' . $rowstatus['status_id'] . '">' . $rowstatus['status_name'] . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Remarks:</label>
                        <textarea name="update_remarks" class="form-control" id="message-text" required></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-block" id="buttn_update" name="submit_update" value="Update" />
            </div>

            </form>

        </div>
    </div>
</div>