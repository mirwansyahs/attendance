<?=@$this->session->flashdata("msg")?>
<div class="row">
  <div class="col-xl-4">
    <div class="card overflow-hidden">
      <div class="bg-primary bg-soft">
        <div class="row">
          <div class="col-7">
            <div class="text-primary p-3">
              <h5 class="text-primary">Welcome Back !</h5>
              <p><?=base_name()?></p>
            </div>
          </div>
          <div class="col-5 align-self-end">
            <img src="<?=base_url()?>assets/images/profile-img.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col-sm-4">
            <div class="avatar-md profile-user-wid mb-4">
              <img src="<?=base_url()?>assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
            </div>
            <h5 class="font-size-15 text-truncate"><?=$this->userdata->EmployeeFirstName?></h5>
            <p class="text-muted mb-0 text-truncate"><?=@$this->userdata->EmployeeRole?></p>
          </div>

          <div class="col-sm-8">
            <div class="pt-4">

              <div class="row">
                <div class="col-4">
                  <p class="text-muted mb-0">Clock-in</p>
                  <h5 class="font-size-15">12:00</h5>
                </div>
                <div class="col-8">
                  <p class="text-muted mb-0"> <?=lang('you_are_currently_at')?></p>
                  <h5 class="font-size-15">Office</h5>
                </div>
              </div>
              <!-- <div class="mt-4">
                <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile
                  <i class="mdi mdi-arrow-right ms-1"></i></a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Monthly Earning</h4>
        <div class="row">
          <div class="col-sm-6">
            <p class="text-muted">This month</p>
            <h3>$34,252</h3>
            <p class="text-muted"><span class="text-success me-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From
              previous period</p>

            <div class="mt-4">
              <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View More <i
                  class="mdi mdi-arrow-right ms-1"></i></a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mt-4 mt-sm-0">
              <div id="radialBar-chart" class="apex-charts"></div>
            </div>
          </div>
        </div>
        <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
      </div>
    </div> -->
  </div>
  <div class="col-xl-8">

    <div class="card" style="height: 208px">
      <div class="card-body">
        <div class="card-head">
          <h3><?=lang('daily_information_board')?></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end row -->


<?php 
foreach ($this->modul as $key) { 
    $cekRole = $this->api->CallAPI('GET', core_api('/api/v1/EmployeeRole/getRow'), ['EmployeeID' => $this->userdata->EmployeeID, 'ModulName' => $key->ModulName]);
    if (json_decode($cekRole)->result->RoleName == "Admin"){ 

        if (file_exists(__DIR__.'/home/home_'.$key->ModulName.'.php')){
          $this->load->view('_backend/home/home_'.$key->ModulName, array('key' => $key));
        }
    } 
}?>

