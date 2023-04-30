<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('ubah_time_profile')?></h4>
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
                    <?=form_open_multipart('hc/shift/updateProses/'.$id)?>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('shift_name')?></label>
                        <input type="text" class="form-control" id="ShiftName" name="ShiftName" value="<?=$data->ShiftName?>">
                    </div>
                    <?php
                    foreach ($dataShiftDay as $key) {
                    ?>
                    <div class="row mb-3" id="stcmp<?=$key->ShiftDayID?>">
                        <div class="col-md-2">
                            <label class="form-label"><?=lang('day')?></label>
                            <input type="text" class="form-control" id="Day" name="Day[]" value="<?=$key->Day+1?>" readonly>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label"><?=lang('time_profile_name')?></label>
                            <select class="form-control" id="TimeProfileID" name="TimeProfileID[]">
								<?php 
                                $getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfile'), 
                                [
                                    'group_by' => 'TimeProfileName', 
                                    'TimeProfileTenant' => $this->userdata->TenantName
                                ]);

                                foreach (json_decode($getData)->result as $value) {
                                ?>
                                <option value="<?=$value->ID?>" <?=($value->ID == $key->TimeProfileID)?'selected':''?>><?=$value->TimeProfileName?></option>
                                <?php } ?>
		
							</select>
                        </div>
                        <div class="col-md-1">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-danger" type="button" onclick="deleteComponent('stcmp<?=$key->ShiftDayID?>')">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                    <?php } ?>
                    <div id="formAddComponent"></div>
                    <div class="row mb-3">
                        <button class="btn btn-block btn-info" type="button" onclick="addComponent()">
                            <i class="bx bx-plus-circle"></i> <?=lang('tambah_data')?></button>
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
    let i = <?=count($dataShiftDay)?>;
    function addComponent()
    {
        i++;
        html = `<div class="row mb-3" id="cmp${i}">
                        <div class="col-md-2">
                            <label class="form-label"><?=lang('day')?></label>
                            <input type="text" class="form-control" id="Day" name="Day[]" value="${i}" readonly>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label"><?=lang('time_profile_name')?></label>
                            <select class="form-control" id="TimeProfileID" name="TimeProfileID[]">
								<?php 
                                $getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfile'), 
                                [
                                    'group_by' => 'TimeProfileName', 
                                    'TimeProfileTenant' => $this->userdata->TenantName
                                ]);

                                foreach (json_decode($getData)->result as $key) {
                                ?>
                                <option value="<?=$key->ID?>"><?=$key->TimeProfileName?></option>
                                <?php } ?>
		
							</select>
                        </div>

                        <div class="col-md-1">
                            <label class="form-label">&nbsp;</label>
                            <button class="btn btn-danger" type="button" onclick="deleteComponent('cmp${i}')">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>`;
        $('#formAddComponent').append(html);
    }

    function deleteComponent(id)
    {
        i--;
        $('#'+id).remove();
    }
</script>