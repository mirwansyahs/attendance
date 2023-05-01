<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('shift')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>hc/timeprofile/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('shift_name')?></th>
                        <th><?=lang('time')?></th>
                        <th><?=lang('shift')?></th>
                        <th width="15%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->ShiftDateCreated?></span>
                            <span class="badge badge-pill badge-soft-success font-size-11">
                                <i class="bx bx-check"></i> <?=$key->ShiftTenant?>
                            </span>
                            <br/>
                            <?=$key->ShiftName?> 
                        </td>
                        <td>
                            <?php
                            $getData = json_decode($this->api->CallAPI('GET', human_capital_api('/api/v1/Shift'), ['ShiftTenant' => $key->ShiftTenant]))->result;
                            foreach ($getData as $key) {
                            ?>
                                <?=$key->TimeName?> (<?=$key->TimeStart?> - <?=$key->TimeEnd?>)<br/>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($key->ProfileShift == 'n'){ ?>
                            <span class="badge badge-pill badge-soft-danger font-size-11">
                                <i class="bx bx-check"></i> <?=lang('no_profile_shift')?>
                            </span>
                            <?php } else { ?>
                            <a class="btn btn-primary btn-sm" href="<?=base_url()?>hc/shift/a/<?=$key->TimeProfileID?>">
                                <i class="bx bx-time"></i> <?=lang('see_profile_shift')?>
                            </a>
                            <?php } ?>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?>hc/timeprofile/update/<?=$key->TimeProfileID?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?>hc/timeprofile/delete/<?=$key->TimeProfileID?>" role="button">
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
