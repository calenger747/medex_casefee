<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">Data Medex</h4>
      </div>
      <div class="card-body">
        <div class="toolbar mt-4 mb-2">
          <button class="btn btn-primary" data-toggle="modal" data-target="#myModalAdd">
            Add Data
          </button>
        </div>
        <div class="material-datatables">
          <table id="medex" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
              <tr>
                <th width="8%">No</th>
                <th>Quotation Number</th>
                <th width="50%">Remarks</th>
                <th>Payment By</th>
                <th>Date Receive</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="myModalAdd" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Medex</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <form id="addMedex" method="POST" action="#" class="form-horizontal">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="control-label mb-3">Quotation Number</label>
            <input type="text" name="add_quotation" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Remarks</label>
            <input type="text" name="add_remarks" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Payment By</label>
            <input type="text" name="add_payment" class="form-control">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Date Receive</label>
            <input type="text" name="add_date_receive" class="form-control datepicker">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success mr-2">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="myModalEdit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Medex</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <form id="editMedex" method="POST" action="#" class="form-horizontal">
        <input type="hidden" name="edit_id" class="form-control" id="edit_id">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="control-label mb-3">Quotation Number</label>
            <input type="text" name="edit_quotation" class="form-control" id="edit_quot">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Remarks</label>
            <input type="text" name="edit_remarks" class="form-control" id="edit_remarks">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Payment By</label>
            <input type="text" name="edit_payment" class="form-control" id="edit_payment">
          </div>
          <div class="form-group mb-3">
            <label class="control-label mb-3">Date Receive</label>
            <input type="text" name="edit_date_receive" class="form-control datepicker" id="edit_date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success mr-2">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal -->