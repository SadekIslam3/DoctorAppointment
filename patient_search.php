<?php include('includes/header.php'); ?>
<style>

.wrapper{
    padding: 1%;
    width: 80%;
    margin: 0 auto;
}

.tbl-full{
    width: 100%;
}

.manage{
    background-color: #f1f2f6;
    padding: 3% 0;
}
</style>

<div class="manage">
    <div class = "wrapper">
        <h1>Search Patient</h1>
        <br>
        <br> 
        
        <form action="patient_view.php" method="POST">
            <table class="table-30">

                <tr>
                    <td>Email Name</td>
                    <td>
                        <input type="text" name="search" placeholder="Search here">
                    </td>
                </tr>
                

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Search" class="btn-update">
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <br>
                <br>

            </table>
            

        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?>