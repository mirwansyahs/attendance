<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('tambah_employee')?></h4>
                    </div>
                    <div class="col-md-6">
                        <!-- <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>core/Portofolio/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            Tambah data
                        </a> -->
                    </div>
                </div>
            </div>

            <div class="row card-body">
                <div class="col-md-6">
                    <?=form_open_multipart('core/Employee/addProses')?>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <label class="form-label"><?=lang('employee_first_name')?></label>
                            <input type="text" class="form-control" id="EmployeeFirstName" name="EmployeeFirstName" value="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><?=lang('employee_middle_name')?></label>
                            <input type="text" class="form-control" id="EmployeeMiddleName" name="EmployeeMiddleName" value="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><?=lang('employee_last_name')?></label>
                            <input type="text" class="form-control" id="EmployeeLastName" name="EmployeeLastName" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label"><?=lang('employee_identification_number')?></label>
                            <input type="text" class="form-control" id="EmployeeIdentificationNumber" name="EmployeeIdentificationNumber" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><?=lang('employee_corporate_email')?></label>
                            <input type="text" class="form-control" id="EmployeeCorporateEmail" name="EmployeeCorporateEmail" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('employee_password')?></label>
                        <input type="text" class="form-control" id="EmployeePassword" name="EmployeePassword" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('employee_position')?></label>
                        <select class="form-control" id="EmployeePosition" name="EmployeePosition">
                            <?php foreach ($position as $key) { ?>
                            <option value="<?=$key->PositionName?>"><?=$key->PositionName?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('employee_tenant')?></label>
                        <select class="form-control" id="EmployeeTenant" name="EmployeeTenant">
                            <?php foreach ($tenant as $key) { ?>
                            <option value="<?=$key->TenantName?>"><?=$key->TenantName?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-success">
                        <i class="fa fa-save"> <?=lang('simpan')?></i>
                    </button>
                    <?=form_close()?>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Required datatable js -->
<script src="<?=base_url()?>assets/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?=base_url()?>assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>