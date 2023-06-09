<?php
if ($dataApproval->total > 0){
?>
<div class="col-md-12">
    <a href="<?=base_url()?>hc/approval">
        <div class="alert alert-info">
            <span style="">
            <b><?=$dataApproval->total?></b> Menunggu Persetujuan Anda
            </span>
            <span style="float: right">
                <i class="bx bx-right-arrow-circle"></i>
            </span>
        </div>
    </a>
</div>
<?php } ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('leave')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?>hc/leave/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th width="25%"><?=lang('leave_type')?></th>
                        <th><?=lang('cause')?></th>
                        <th width="15%"><?=lang('date')?></th>
                        <th width="15%"><?=lang('request_status')?></th>
                        <th width="15%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                        $color = "info";
                        if ($key->RequestStatus == "SSSUBM"){
                            $color = "primary";
                        }else if($key->RequestStatus == "SSREJC"){
                            $color = "danger";
                        }else if($key->RequestStatus == "SSAPPR"){
                            $color = "success";
                        }else if($key->RequestStatus == "APWAIT"){
                            $color = "";
                        }
                        $dateStart = new DateTime(date_format(date_create($key->StartDate), "d M Y"));
                        $dateEnd = new DateTime(date_format(date_create($key->EndDate), "d M Y"));
                        $interval = $dateStart->diff($dateEnd);
                        // $getData = @json_decode($this->api->CallAPI('GET', human_capital_api('/api/v1/Leave'), ['ID' => $key->ID]))->result;
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11"><?=$key->DateCreated?></span>
                            <span class="badge badge-pill badge-soft-success font-size-11">
                                <i class="bx bx-check"></i> <?=$key->RequestType?>
                            </span>
                            <span class="badge badge-pill badge-soft-<?=@$color?> font-size-11">
                                <i class="bx bx-time"></i> <?=$key->RequestStatus?>
                            </span>
                            <br/>
                            <?=$key->LeaveTypeName?>
                        </td>
                        <td>
                            <?=($key->RequestCause != "")?$key->RequestCause:'Tidak ada alasan.'?>
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-danger font-size-11">
                                <i class="bx bx-time"></i> <?=$interval->days+1?> <?=lang('day_off')?>
                            </span><br/><br/>
                            <span class="badge badge-pill badge-soft-info font-size-11">
                                <i class="bx bx-time"></i> <?=date_format(date_create($key->StartDate), "d M Y")?> - <?=date_format(date_create($key->EndDate), "d M Y")?>
                            </span>
                        </td>
                        <td>
                            <?=$key->RequestDescription?>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?>hc/leave/update/<?=$key->ID?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?>hc/leave/delete/<?=$key->ID?>" role="button">
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
