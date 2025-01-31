<!-- Status Modal -->
<?php include("../connection/connect.php"); ?>
<div class="modal fade" id="edit-type-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Document Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
          
                <form action="" method="post">

                    <div class="form-group">
                        <label for="status-name" class="col-form-label">Document Type Name:</label>
                        <input type="text" name="editDocumentTypeName" class="form-control form-control-user" id="document_type_name" value="<?php echo htmlspecialchars($document_type_name);?>">
                        <label for="status-name" class="col-form-label">Description:</label>
                        <input type="text" name="editDocumentTypeDescription" class="form-control form-control-user" id="document_type_description" value="<?php echo htmlspecialchars($document_type_description);?>">
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-lg btn-block" id="buttn_add" name="submit_type_update" value="Update" />
            </div>

            </form>

        </div>
    </div>
</div>