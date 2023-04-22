<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('ubah_tenant_modul')?></h4>
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
                    <?=form_open_multipart('core/TenantSettingModul/updateProses/'.$id.'/'.$data->TenantID)?>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('tenant_name')?></label>
                        <input type="text" class="form-control" id="Tenant" name="Tenant" value="<?=$data->Tenant?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('modul_name')?></label>
                        <select class="select2 form-control" id="ModulName" name="ModulName">
                        <?php foreach ($dataModul as $key) { ?>
                            <option value="<?=$key->ModulName?>" <?=$key->ModulName == $data->ModulName?'selected':''?>><?=lang($key->ModulName)?></option>
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

<script src="<?=base_url()?>assets/backend/libs/select2/js/select2.min.js"></script>

<script>
    $('.select2').select2();
</script>