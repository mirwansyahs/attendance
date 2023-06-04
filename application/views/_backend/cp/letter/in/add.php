<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-6">
                        <h4><?=lang('tambah_letter_in')?></h4>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            
            <?=form_open_multipart($this->uri->segment(1).'/letter/addProses/in')?>
            <div class="row card-body">
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_no')?></label>
                        <input type="text" class="form-control" id="LetterNo" name="LetterNo" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_attachment')?></label>
                        <input type="text" class="form-control" id="LetterAttachment" name="LetterAttachment" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_subject')?></label>
                        <input type="text" class="form-control" id="LetterSubject" name="LetterSubject" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_pic')?></label>
                        <input type="text" class="form-control" id="LetterPIC" name="LetterPIC" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_signature')?></label>
                        <input type="text" class="form-control" id="LetterSignature" name="LetterSignature" value="">
                    </div>
                    
                    <button class="btn btn-success">
                        <i class="fa fa-save"> <?=lang('simpan')?></i>
                    </button>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_signature_position')?></label>
                        <input type="text" class="form-control" id="LetterSignaturePosition" name="LetterSignaturePosition" value="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?=lang('letter_name')?></label>
                        <input type="text" class="form-control" id="LetterName" name="LetterName" value="">
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
                    <div class="mb-3">
                        <label class="form-label"><?=lang('choose_file')?></label>
                        <?php $arr = array('File', 'Buat Baru'); ?>
                        <select name="ChooseFile" id="ChooseFile" class="form-control">
                            <?php for ($i = 0; $i < count($arr); $i++){ ?>
                                <option value="<?=$arr[$i]?>"><?=$arr[$i]?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>
            <?=form_close()?>

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

	function setChangePilihanSurat()
	{
		if ($('#pilihan_surat').val() == "File"){
			$('#file').css("display", "block");
			$('#baru').css("display", "none");
			$('#surat_types').css("display", "none");
			$('#jenis_surats').css("display", "block");
			$('#no_surats').css("display", "block");
			// getNoSurat();
		}else{
			$('#file').css("display", "none");
			$('#baru').css("display", "block");
			$('#surat_types').css("display", "block");
			$('#jenis_surats').css("display", "none");
			$('#no_surats').css("display", "none");
			getNoSurat();
		}
	}

	setChangePilihanSurat();
</script>