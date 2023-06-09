<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('tenant_location')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>core/TenantLocation/add/<?=$id?>" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('tenant_location_name')?></th>
                        <th><?=lang('tenant_name')?></th>
                        <th><?=lang('tenant_location_address')?></th>
                        <th><?=lang('tenant_location_radius')?></th>
                        <th width="20%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->TenantLocationDateCreated?></span><br/>
                            <?=$key->TenantLocationName?> 
                        </td>
                        <td><?=$key->Tenant?></td>
                        <td>
                            <?=$key->TenantLocationAddress?><br/>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->TenantLocationLatitude?>, <?=$key->TenantLocationLongitude?></span>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->TenantLocationRadius?> m</span>
                        </td>
                        <td>
                            <a href="https://www.google.com/maps/@<?=$key->TenantLocationLatitude?>,<?=$key->TenantLocationLongitude?>,15z" target="_BLANK" class="btn btn-default" href="<?=base_url()?>core/TenantLocation/update/<?=$key->TenantLocationID?>" role="button">
                                <i class="fa fa-map"></i>
                                <?=lang('buka_maps')?>
                            </a>
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?>core/TenantLocation/update/<?=$key->TenantLocationID?>/<?=$id?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?>core/TenantLocation/delete/<?=$key->TenantLocationID?>/<?=$id?>" role="button">
                                <i class="fa fa-trash"></i>
                                <?=lang('hapus')?>
                            </a>
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
