<form action="" method="post">
                    <div class="form-group">
                    <label for="cat_title">Edit Category</label>
                        <?php 
                        
                        if (isset($_GET['edit'])) {
                            $edit_id = $_GET['edit'];
                            if ($edit_id) {

                                $select_category = "SELECT * FROM categories WHERE cat_id = $edit_id";
                                $execute = mysqli_query($connection, $select_category);
                                $selected_category = mysqli_fetch_assoc($execute);
                                if (!$execute) {
                                    die(mysqli_error($connection));
                                } else { ?>
                                <input type="text" value= "<?php echo $selected_category['cat_title'] ?>" name="cat_title" class="form-control">
                                
                            <?php
                            }
                            }
                        }

                        if (isset($_POST['edit'])) {
                            
                              $updated_category = $_POST['cat_title'];
                              $edit_category = "UPDATE categories SET cat_title='$updated_category' WHERE cat_id = $edit_id";
      
                              $edit_query = mysqli_query($connection, $edit_category);
      
                              if (!$edit_query) {
                                  die('Error' . mysqli_error($connection));
                              } 
                              header('Location: categories.php');
      
                         }
                        ?>
                
                    </div>

                    
                    <div class="form-group">
                    <input type="submit" name="edit" class="btn btn-primary">
                    </div>
                </form>

