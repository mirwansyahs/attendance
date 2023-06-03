<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('ubah_request')?></h4>
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
                    <?=form_open_multipart('hc/leave/updateProses/'.$id)?>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('request_type')?></label>
                        <select name="RequestType" id="RequestType" class="form-control" onchange="checkLeave()">
                            <?php foreach ($RequestType->result as $key) { ?>
                                <option value="<?=$key->ID?>" <?=($key->ID == $data->RequestTypeID)?'selected':''?>><?=$key->RequestType?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3" id="cmpLeaveType">
                        <label class="form-label"><?=lang('request_type')?></label>
                        <select name="LeaveType" id="LeaveType" class="form-control">
                            <?php foreach ($LeaveType->result as $key) { ?>
                                <option value="<?=$key->ID?>" <?=($key->ID == $data->LeaveTypeID)?'selected':''?>><?=$key->LeaveTypeName?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('start_date')?></label>
                        <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?=date_format(date_create($data->StartDate), "Y-m-d")?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('end_date')?></label> 
                        <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?=date_format(date_create($data->EndDate), "Y-m-d")?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('file')?></label>
                        <input type="file" class="form-control" id="FileRequest" name="FileRequest" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('cause')?></label>
                        <textarea class="form-control" id="RequestCause" name="RequestCause"><?=$data->RequestCause?></textarea>
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
        checkLeave();
    });

    function checkLeave()
    {
        if ($('#RequestType').val() == 1){
            $('#cmpLeaveType').css("display", "block");
        }else{
            $('#cmpLeaveType').css("display", "none");
        }
    }
</script>