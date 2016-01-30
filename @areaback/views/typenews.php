<?php

$query = $dbCon->query("select * from type_news  order by type_id ASC");

?>

<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ชื่อหมวดหมู่ (TH)</th>
      <th class="hidden-xs">ชื่อหมวดหมู่ (EN)</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  while ($redata = $query->fetch_object()) {

  ?>
    <tr>
      <td align="left"><?=$redata->type_name_th;?></td>
      <td class="hidden-xs"><?=$redata->type_name_en;?></td>
      <td>
        <div align="right">
          <a href="<?=$url2.'/'.$get_part0.'/'.$get_part1.'/edit/'.$redata->type_id;?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
          <a onclick="deldata('<?=$redata->type_id;?>','<?=$redata->type_name_th;?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
  <?php }?>                
  </tbody>

</table>