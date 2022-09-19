<?php include 'header.php'; 

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

?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" id="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" id="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class" id="sclass">
                <option value="" selected disabled>Select Class</option>
                <?php
                    $course = get_course();
                    foreach ($course as $row) {
                ?>
                <option value="<?php echo $row->cid;?>"><?php echo $row->cname;?></option>
            <?php  }?>
            
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" id="sphone" />
        </div>
        <button class="submit" type="button" onclick="createStudent()">Save</button>
    </form>
</div>
</div>
</body>
</html>
