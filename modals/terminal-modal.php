<!-- Status Modal -->
<?php include("connection/connect.php"); ?>
<div class="modal fade" id="terminal-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tag as Terminal</h5>
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
                        <label for="Type">Action taken</label>
                        <select name="release_action" class="form-control custom-select" data-placeholder="Select Type" tabindex="1">

                            <?php

                            $sqltype = "select * FROM action WHERE action_id != 6";
                            $type = mysqli_query($db, $sqltype);
                            while ($rowtype = mysqli_fetch_array($type)) {
                                echo ' <option value="' . $rowtype['action_id'] . '">' . $rowtype['action_name'] . '</option>';
                            }

                            ?>
                        </select>
                        <label for="message-text" class="col-form-label">Remarks:</label>
                        <textarea name="terminal_remarks" class="form-control" id="message-text" required></textarea>
                        <label for="message-text" class="col-form-label">Tag this document as TERMINAL in case your office is the end of its paper trail.</label>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-block" id="buttn_update" name="submit_terminal" value="Tag as Terminal" />
            </div>

            </form>

        </div>
    </div>
</div>