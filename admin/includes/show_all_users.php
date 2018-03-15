<table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    <tbody>
                    <?php 
                    
                $query = "SELECT * FROM users";
                $posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($posts)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                    $email = $row['email'];
                   
            ?>          <tr>
                         <td><?php echo $user_id; ?></td>
                         <td><img width="100px" src='../images/<?php echo $user_image; ?>'</td>
                         <td><?php echo $username; ?></td>
                         <td><?php echo $user_firstname; ?></td>
                         <td><?php echo $user_lastname; ?></td>
                         <td><?php echo $user_role; ?></td>
                         <td><?php echo $email; ?></td>

                         <td><a href="users.php?delete=<?php echo $user_id ?>">Delete</a></td>
                         <td><a href="users.php?source=edit_user&edit=<?php echo $user_id ?>">Edit</a></td> 
    
                        </tr>
                          

                <?php } ?>
                    </tbody>
                </table>