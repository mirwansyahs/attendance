<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('letter_disposisi')?></h4>
                    </div>
                    <div class="col-md-6">
                        <!-- <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>hc/letter/add/disposisi" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a> -->
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('letter_name')?></th>
                        <th><?=lang('letter_number')?></th>
                        <th><?=lang('date')?></th>
                        <th width="15%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                        if ($key->LetterType == "in"){
                            $icon = "bx-left-arrow-circle";
                        }else{
                            $icon = "bx-right-arrow-circle";
                        }

                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->DateCreated?></span>
                            <span class="badge badge-pill badge-soft-success font-size-11">
                                <i class="bx bx-check"></i> <?=$key->LetterTenant?>
                            </span>
                            <span class="badge badge-pill badge-soft-warning font-size-11">
                                <i class="bx <?=$icon?>"></i> <?=($key->LetterType == "in") ? lang('letter_in') : lang('letter_out')?>
                            </span>
                            <br/>
                            <?=$key->LetterName?>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-primary font-size-11">
                                <i class="bx bx-time"></i> <?=$key->LetterNo?>
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-primary font-size-11">
                                <i class="bx bx-time"></i> <?=$key->LetterDate?>
                            </span>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?><?=$this->uri->segment(1)?>/letter/delete/disposisi/<?=$key->ID?>" role="button">
                                <i class="fa fa-trash"></i>
                                <?=lang('hapus_disposisi')?>
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
