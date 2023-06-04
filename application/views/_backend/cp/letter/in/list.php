<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('letter_in')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?><?=$this->uri->segment(1)?>/letter/add/in" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('letter_name')?></th>
                        <th><?=lang('letter_number')?></th>
                        <th><?=lang('date')?></th>
                        <th width="25%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                        $getData = json_decode($this->api->CallAPI('GET', correspondency_api('/api/v1/Disposisi/getRow'), ['MailLetterID' => $key->ID, 'LetterTenant' => $this->userdata->TenantName]));
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->DateCreated?></span>
                            <span class="badge badge-pill badge-soft-success font-size-11">
                                <i class="bx bx-check"></i> <?=$key->LetterTenant?>
                            </span>
                            <br/>
                            <?=$key->LetterName?>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-primary font-size-11">
                                <i class="bx bx-tag"></i> 
                                <?=$key->LetterNo?>
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-primary font-size-11">
                                <i class="bx bx-time"></i> <?=$key->LetterDate?>
                            </span>
                        </td>
                        <td>
                            <?php if ($getData->total > 0){ ?>
                            <a name="" id="" class="btn btn-info" href="#" role="button">
                                <i class="fa fa-eye"></i>
                                <?=lang('see_disposisi')?>
                            </a>
                            <?php }else{ ?>
                            <a name="" id="" class="btn btn-info" href="<?=base_url()?><?=$this->uri->segment(1)?>/letter/addtodisposisi/in/<?=$key->ID?>" role="button">
                                <i class="fa fa-copy"></i>
                                <?=lang('disposisi')?>
                            </a>
                            <?php } ?>

                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?><?=$this->uri->segment(1)?>/letter/update/in/<?=$key->ID?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?><?=$this->uri->segment(1)?>/letter/delete/in/<?=$key->ID?>" role="button">
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
