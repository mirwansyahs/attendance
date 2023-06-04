<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('tambah_letter_out')?></h4>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>

            <div class="row card-body">
                <div class="col-md-6">
                    <?=form_open_multipart($this->uri->segment(1).'/letter/addProses/out')?>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_no')?></label>
                        <input type="text" class="form-control" id="LetterNo" name="LetterNo" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_name')?></label>
                        <input type="text" class="form-control" id="LetterName" name="LetterName" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('document_number')?></label>
                        <input type="text" class="form-control" id="DocumentNumber" name="DocumentNumber" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_secrecy')?></label>
                        <?php $arr = array('Public', 'Private'); ?>
                        <select name="LetterSecrecy" id="LetterSecrecy" class="form-control">
                            <?php for ($i = 0; $i < count($arr); $i++){ ?>
                                <option value="<?=$arr[$i]?>"><?=$arr[$i]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_date')?></label>
                        <input type="date" class="form-control" id="LetterDate" name="LetterDate" value="<?=date('Y-m-d')?>">
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