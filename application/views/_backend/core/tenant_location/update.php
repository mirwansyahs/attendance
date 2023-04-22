<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('ubah_tenant')?></h4>
                    </div>
                    <div class="col-md-6">
                        <!-- <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>core/Portofolio/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            Tambah data
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?=form_open_multipart('core/TenantLocation/updateProses/'.$id.'/'.$tenant)?>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_location_name')?></label>
                        <input type="text" class="form-control" id="TenantLocationName" name="TenantLocationName" value="<?=$data->TenantLocationName?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_location_address')?></label>
                        <input type="text" class="form-control" id="TenantLocationAddress" name="TenantLocationAddress" value="<?=$data->TenantLocationAddress?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_location_latitude')?></label>
                        <input type="text" class="form-control" id="TenantLocationLatitude" name="TenantLocationLatitude" value="<?=$data->TenantLocationLatitude?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_location_longitude')?></label>
                        <input type="text" class="form-control" id="TenantLocationLongitude" name="TenantLocationLongitude" value="<?=$data->TenantLocationLongitude?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_location_radius')?></label>
                        <input type="text" class="form-control" id="TenantLocationRadius" name="TenantLocationRadius" value="<?=$data->TenantLocationRadius?>">
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