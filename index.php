<?php
include "header.php";

function get_users() {
  // get list of class from node js API
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/users");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $results= curl_exec($ch);
  curl_close($ch);
  $users = json_decode($results);

  return $users;
}


?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
  

    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php 
            $users = get_users();
            foreach ($users as $row){
              
            ?>
            <tr>
                <td><?php echo $row->sid ?></td>
                <td><?php echo $row->sname ?></td>
                <td><?php echo $row->saddress ?></td>
                <td><?php echo $row->cname ?></td>
                <td><?php echo $row->sphone?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row->sid ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row->sid ?>'>Delete</a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
<?php
 ?>
</div>
</div>
</body>
</html>
