<?php include('includes/header.php'); ?>
<div class="manage">
    <div class = "wrapper">
        <h1>Doctor Dashboard</h1>
        <br>
        <br> 
        <a href="appointment_set.php" class="btn-add">Appointment Store</a>
        <br>
        <br>
        <br>
        <form action="appointment_search.php" method="POST">
            <table class="table-30">

                <tr>
                    <td>Doctor Name</td>
                    <td>
                        <input type="text" name="search" placeholder="Search here">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" name="submit" value="Search" class="btn-update">
                    </td>
                </tr>
                <br>
                <br>

            </table>
            

        </form>
    </div>
</div>
<?php include('includes/footer.php'); ?>