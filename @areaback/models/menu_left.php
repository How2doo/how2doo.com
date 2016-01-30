<ul class="sidebar-menu">
  <li class="header">MENU MANAGEMENT</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="<?=$url2;?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
  <li><a href="<?=$url2;?>/posts"><i class="fa fa-paper-plane"></i> <span>จัดการบทความ</span><span class="label label-primary pull-right"><?=countdata('post','1');?></span></a></li>
  <li><a href="<?=$url2;?>/category"><i class="fa fa-paper-plane"></i> <span>จัดการหมวดหมู่</span><span class="label label-primary pull-right"><?=countdata('category','1');?></span></a></li>
  	
	<li class="treeview">
    <a href="#"><i class="fa fa-image"></i> <span>จัดการแบนเนอร์</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        
        <li><a href="<?=$url2;?>/banner/bannerads"><i class="fa fa-image"></i> แบนเนอร์โฆษณา <span class="label label-primary pull-right"><?=countdata('banner_ads','1');?></span></a></li>
        
      </ul>
  	</li>

  <li class="treeview">
    <a href="#"><i class="fa fa-user-secret"></i> <span>จัดการสมาชิก</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu"> 
        <li><a href="<?=$url2;?>/member/writer"><i class="fa fa-user"></i> สมาชิกทั่วไป <span class="label label-success pull-right"><?=countdata('member','member_status = 1');?></span></a></li>
      </ul>
  </li>


  <li class="treeview">
    <a href="#"><i class="fa fa-database"></i> <span>จัดการข้อมูลพื้นฐาน</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="<?=$url2;?>/setting/cog"><i class="fa fa-cogs"></i> ตั้งค่าเว็บไซต์</a></li>
        <li><a href="<?=$url2;?>/setting/user"><i class="fa fa-user"></i> จัดการผู้ใช้งานระบบ</a></li>
      </ul>
  </li>
</ul>