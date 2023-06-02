<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            <?=$this->session->flashdata('msg')?>

            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('employee')?></h4>
                    </div>
                    <div class="col-md-6">
                        <a name="" id="" class="btn btn-primary" style="float: right" href="<?=base_url()?><?=$this->uri->segment(1)?>/employee/add" role="button">
                            <i class="fa fa-plus-square"></i>
                            <?=lang('tambah_data')?>
                        </a>
                    </div>
                </div>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive w-100">
                <thead>
                    <tr>
                        <th><?=lang('employee_name')?></th>
                        <th><?=lang('employee_identification')?></th>
                        <th><?=lang('employee_personal_email')?></th>
                        <th><?=lang('employee_phone')?></th>
                        <th width="15%"><?=lang('aksi')?></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    foreach ($data as $key) {
                    ?>
                    <tr>
                        <td>
                            <span class="badge badge-pill badge-soft-info font-size-11">NIP.<?=$key->EmployeeCode?></span><br/>
                            <?=$key->EmployeeFirstName?> <?=$key->EmployeeMiddleName?> <?=$key->EmployeeLastName?> 
                        </td>
                        <td>
                             NIK.<span class="badge badge-pill badge-soft-info font-size-11"><?=$key->EmployeeIdentificationNumber?></span><br/>
                             NoKK.<span class="badge badge-pill badge-soft-info font-size-11"><?=$key->EmployeeFamilyIdentificationNumber?></span><br/>
                            
                        </td>
                        <td>
                            <span class="badge badge-pill badge-soft-success font-size-11"><?=$key->EmployeeRole?></span><br/>
                            <?=$key->EmployeeCorporateEmail?>
                    
                        </td>
                        <td><?=$key->EmployeePhone?></td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?><?=$this->uri->segment(1)?>/employee/update/<?=$key->EmployeeID?>" role="button">
                                <i class="fa fa-edit"></i>
                                <?=lang('ubah')?>
                            </a>
                            <a name="" id="" class="btn btn-danger" href="<?=base_url()?><?=$this->uri->segment(1)?>/employee/delete/<?=$key->EmployeeID?>" role="button">
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
