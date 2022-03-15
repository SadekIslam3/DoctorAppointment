<?php include('includes/header.php'); ?>

   <!-- catagories section -->

   <section class="service_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          <span class="design_dot"></span>
          Our Catagories
        </h2>
        <p>
          It is a long established fact that a reader will be distracted
        </p>
      </div>
      <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM category";

                    //Execute Query
                    $res = mysqli_query($con, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether we have data in database or not
                    if($count>0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $category_id = $row['category_id'];
                            $category_name = $row['category_name'];
                            $image_name = $row['image_name'];

                            ?>
      
        
        <div class=" mx-auto">
          <div class="box"> 
          <?php  
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
            <img src="<?php echo SITEURL; ?>images/catagory/<?php echo $image_name; ?>" alt="" />
            <?php
                                        }
                                        else
                                        {
                                            //DIsplay the MEssage
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                        ?>                            
            <a href="<?php echo SITEURL;?>doctor.php?category_id=<?php echo $category_id?>"><?php echo $category_name; ?></a> 
            <?php

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
          </div>
        </div>
  
		    
		  
		
  </section>

  <!-- end catagories section -->

  

  <?php include('includes/footer.php'); ?>