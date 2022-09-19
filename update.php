<?php include 'header.php';
 ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
     <?php
     include "config.php";
     if (isset($_POST['showbtn'])) {
    
    
    function get_data(){
        $stu_id=$_POST['sid'];
        
        $url = "http://localhost:3000/data1/$stu_id";
      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result);
        var_dump($result);
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

      $data = get_data();
      foreach ($data as $row)

    {
   
     ?>
    <form class="post-form">
        <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="id"  id="sid" value="<?php echo $row->sid?>" />
            <input type="text" name="name" id="sname" value="<?php echo $row->sname?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" id="saddress" value="<?php echo $row->saddress?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class" id="sclass">
                <option value="<?php echo $row->sclass?>" selected disabled>Change course</option>
                <?php
                    $course = get_course();
                    foreach ($course as $row1) {
                ?>
                <option value="<?php echo $row1->cid?>"><?php echo $row1->cname?></option>
            <?php  }?>
            
            </select>
        </div>
         <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" id="sphone" value="<?php echo $row->sphone?>"/>
        </div>
        <button class="submit" type="button" onclick="updateStudent()">Save</button>
    </form>
    <?php       
         }
      }
    

     ?>
</div>
</div>
</body>
</html>
