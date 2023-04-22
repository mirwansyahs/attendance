<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('tenant')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>core/Tenant/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('tenant_name')?></th>
                        <th width="15%"><?=lang('tenant_modul')?></th>
                        <th width="15%"><?=lang('tenant_location')?></th>
                        <th width="25%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->TenantDateCreated?></span>
                            <?php if ($key->TenantCore == 1){ ?>
                                <span class="badge badge-pill badge-soft-success font-size-11">
                                    <i class="fa fa-check-circle"></i>
                                    <?=strtoupper(lang('core'))?>
                                </span>
                            <?php } ?>
                            <br/>
                            <?=$key->TenantName?> 
                        </td>
                        <td>
                            <a href="<?=base_url()?>core/TenantSettingModul/a/<?=$key->TenantID?>" class="btn btn-primary btn-sm">
                                <i class="bx bx-cog"> <?=lang('tenant_see_modul')?></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?=base_url()?>core/TenantLocation/a/<?=$key->TenantID?>" class="btn btn-primary btn-sm">
                                <i class="bx bx-map-alt"> <?=lang('tenant_see_location')?></i>
                            </a>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?>core/Tenant/update/<?=$key->TenantID?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?>core/Tenant/delete/<?=$key->TenantID?>" role="button">
                                <i class="fa fa-trash"></i>
                                <?=lang('hapus')?>
                            </a>
                            <?php if ($key->TenantCore == 0){ ?>
                            <a name="" id="" class="btn btn-success" href="<?=base_url()?>core/Tenant/core/<?=$key->TenantID?>" role="button">
                                <i class="fa fa-check"></i>
                                <?=lang('jadikan_core')?>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

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
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
