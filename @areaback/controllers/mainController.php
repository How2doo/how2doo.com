<script type="text/javascript">
function updateBids() {
	var url="<?=$url2;?>/models/chart/chart_month.php";
	jQuery("#static").load(url);
	

}
setInterval("updateBids()",20000);
</script>

          
<div class="row">
	<div class="col-md-12">
		<!-- PRODUCT LIST -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">สถิติการเยี่ยมชมเว็บไซต์ จำแนกเดือน</h3>
                  	<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
         	</div><!-- /.box-header -->
	      	<div class="box-body">
	           <div id="static" style="height: 390px;" align="center"> กรุณารอสักครู่... </div>  
	                
	    	</div><!-- /.box-body -->
			<div class="box-footer text-center">
			<a href="javascript::;" class="uppercase"></a>
	 		</div><!-- /.box-footer -->
 		</div><!-- /.box -->
 	</div>



            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">เยี่ยมชมวันนี้</span>
                  <span class="info-box-number"><?=staticToday();?> PV</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    <?=$thai_day_arr[date("w")+1].' ที่ '.date("d-m-Y");?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">เยี่ยมชมเมื่อวาน</span>
                  <span class="info-box-number"><?=number_format(staticLastday(),0);?> PV</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    <?=$thai_day_arr[date("w")].' ที่ '.(date("d")-1).'-'.date("m-Y");?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">เยี่ยมชมเดือนนี้</span>
                  <span class="info-box-number"><?=number_format(staticMonth(),0);?> PV</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    <?php
                    $m = date("m");
                    print $thai_month_arr[$m].' '.date("Y");?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-tachometer"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">เยี่ยมชมทั้งหมด</span>
                  <span class="info-box-number"><?=number_format(staticYear(),0);?> PV</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    <?="ปี ".date("Y");?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->