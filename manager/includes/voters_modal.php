<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="vote_count" class="col-sm-3 control-label">Vote Count</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="vote_count" name="vote_count" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="campus" class="col-sm-3 control-label">Campus</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="campus" name="campus" required>
                        <option value selected="" selected>-- SELECT --</option>
                        <option value="Bergen">Bergen</option>
                        <option value="Oslo">Oslo</option>
                        <option value="Stavanger">Stavanger</option>
                        <option value="Trondheim">Trondheim</option>
                        <option value="National">National</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="voters_key" class="col-sm-3 control-label">Voter Key</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="voters_key" name="voters_key" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="vote_count" class="col-sm-3 control-label">Vote Count</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="vote_count" name="vote_count" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="edit_campus" class="col-sm-3 control-label">Campus</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_campus" name="campus" required>
                        <option value selected="" selected>-- SELECT --</option>
                        <option value="Bergen">Bergen</option>
                        <option value="Oslo">Oslo</option>
                        <option value="Stavanger">Stavanger</option>
                        <option value="Trondheim">Trondheim</option>
                        <option value="National">National</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_voters_key" class="col-sm-3 control-label">Voter Key</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_voters_key" name="voters_key" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE VOTER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Import CSV -->
<div class="modal fade" id="import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Import voters</b></h4>
                  <a href="Template.xlsx" download>Download template</a>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_import.php" enctype="multipart/form-data">
                <input type="hidden" class="import" name="import">
                <div class="form-group">
                    <label for="import" class="col-sm-3 control-label">File</label>

                    <div class="col-sm-9">
                      <input type="file" id="file" name="file" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Send Email -->
<div class="modal fade" id="sendmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Send mail</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_email.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Send email to election list</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="sendmail"><i class="fa fa-check-square-o"></i> Send</button>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sendmailsingle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>Send mail</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="voters_email_single.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>Send email to user</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="sendmailsingle"><i class="fa fa-check-square-o"></i> Send</button>
              </form>
            </div>
        </div>
    </div>
</div>