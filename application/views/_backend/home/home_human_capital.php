<div class="row">
  <div class="col-md-12">
    <div class="card card-outline">

      <div class="card-body">

        <div class="card-head">
          <h3><?=lang($key->ModulName)?></h3>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-xl-8">
    
  </div> -->


  <div class="col-xl-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4"><?=lang('employee_present')?></h4>
        <div id="pie-chart" class="e-charts"></div>
      </div>
    </div>
  </div>
 
</div>
<!-- end row -->

<!-- echarts js -->
<script src="<?=base_url()?>assets/backend/libs/echarts/echarts.min.js"></script>

<script>
  var dom = document.getElementById("pie-chart");
  var myChart = echarts.init(dom);
  var app = {};
  option = null;
  option = {
      tooltip : {
          trigger: 'item',
          formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      legend: {
          orient: 'vertical',
          left: 'left',
          data: ['Alpha','Sakit','Izin','Hadir'],
          textStyle: {color: '#8791af'}
      },
      color: ['#cc0000', '#f4c325', '#00beff', '#74c365'],
      series : [
          {
              name: 'Total kehadiran',
              type: 'pie',
              radius : '55%',
              center: ['50%', '60%'],
              data:[
                  {value:40, name:'Alpha'},
                  {value:24, name:'Sakit'},
                  {value:50, name:'Izin'},
                  {value:368, name:'Hadir'}
              ],
              itemStyle: {
                  emphasis: {
                      shadowBlur: 10,
                      shadowOffsetX: 0,
                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                  }
              }
          }
      ]
  };
  ;
  if (option && typeof option === "object") {
      myChart.setOption(option, true);
  }
</script>