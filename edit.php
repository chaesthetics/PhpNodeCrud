<?php include 'header.php';



function get_data(){
  
  $stu_id = $_GET['id'];
  $url = "http://localhost:3000/data1/$stu_id";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  curl_close($ch);
  $data = json_decode($result);
  return $data;
}

function get_course() {
  // get list of class from node js API
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/class");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  curl_close($ch);
  $class = json_decode($result);

  return $class;
}

function get_course1() {
  // get list of class from node js API
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/course1");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $result = curl_exec($ch);
  curl_close($ch);
  $class1 = json_decode($result);

  return $class1;
}


?>

<div id="main-content">
    <h2>Update Record</h2>

    <?php
     $data1 = get_data();
     foreach ($data1 as $row1){
    ?>


    <form class="post-form">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" id="sid" value="<?php echo $row1->sid?>"/>
          <input type="text" name="sname" id="sname"value="<?php echo $row1->susername?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" id="saddress" value="<?php echo $row1->spassword?>"/>
      </div>
      <div class="form-group">
            <label>Class</label>
            <select name="class" id="sclass">
        
                <option value="<?php echo $row1->sclass?>" selected disabled>Change Course</option>  <?php }?>
                <?php
                
                    $course = get_course();
                    foreach ($course as $row) {
                    
                ?>
                <option $select value="<?php echo $row->cid?>"><?php echo $row->cname;?></option>
            <?php  }?>
            
            </select>
        </div>
        
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" id="sphone" value="<?php echo $row1->sphone?>"/>
        </div>
        <button class="submit" type="button" onclick="updateStudent()">Save</button>
    </form>
  <?php 
  
    
  ?>

</div>
</div>
</body>
</html>
