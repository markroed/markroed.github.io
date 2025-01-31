<!-- Status Modal -->
<?php include("../connection/connect.php"); ?>
<div class="modal fade" id="add-steps-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Step</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $doc_type_id = $_GET["document-type-id"];
                //Select tracking number id
                $sqldoc_type = 'SELECT steps.steps_id,steps.createdby_officeid,steps.document_type_id,steps.office_id,steps.step_number,office.office_id,office.office_name FROM steps, office WHERE steps.document_type_id = ' . $doc_type_id . ' and steps.office_id = office.office_id ORDER BY step_number desc limit 1';

                //next step is 1 because 0 office for step 1. it will not query. step 1 is creation
                $doc_type = mysqli_query($db, $sqldoc_type);
                if (!mysqli_num_rows($doc_type) > 0) {
                    $doc_type_next_step = 1;
                } else {
                    $rowdoc_type = mysqli_fetch_array($doc_type);
                    $doc_type_next_step = $rowdoc_type["step_number"];
                }

                ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="status-name" class="col-form-label">Next Step #:</label>
                        <input type="number" name="nextstepnumber" class="form-control form-control-user" id="nextstepnumber" readonly value=<?php echo $doc_type_next_step; ?>>

                    </div>
                    <div class="form-group">
                        <select name="office" class="form-control custom-select" data-placeholder="Select Office" tabindex="1">

                            <?php

                            $sqloffice = "select * FROM office where office_id != 1";
                            $office = mysqli_query($db, $sqloffice);
                            while ($rowoffice = mysqli_fetch_array($office)) {
                                echo ' <option value="' . $rowoffice['office_id'] . '">' . $rowoffice['office_name'] . '</option>';
                            }

                            ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-block" id="buttn_add" name="submit_step" value="Add" />
            </div>

            </form>

        </div>
    </div>
</div>