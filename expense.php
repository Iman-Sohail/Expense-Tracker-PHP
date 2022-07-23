<?php
    include_once("./include/conn.inc.php");
    include_once("./include/header.php");
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4">Expense</h1>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Expense DataTable
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Expense Name</th>
                            <th>Expense Cost</th>
                            <th>Date&Time</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                        <?php 

                            include_once("./include/conn.inc.php");

                            $query = "SELECT * FROM `expense`";

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result)) {
                                while ($data = mysqli_fetch_array($result)) {

                        ?>

                    <tbody>
                        <tr>
                            <td><?php echo $id = $data['0']; ?></td>
                            <td><?php echo $data['1']; ?></td>
                            <td><?php echo $data['2']; ?></td>
                            <td><?php echo $data['3']; ?></td>
                            <td><button type="button" class="btn btn-success editbtn">Edit</button></td>

                            <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
                            <div class="modal fade" id="editmodal" tabindex="-1" data-bs-toogle="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Edit Expence Data </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                        <form action="" method="POST">

                                            <div class="modal-body">

                                                <input type="hidden" name="update_id" id="update_id">

                                                <div class="form-group">
                                                    <label> Expence Name </label>
                                                    <input type="text" name="expenceName" id="expenceName" class="form-control" placeholder="Enter Expence Name">
                                                </div>

                                                <div class="form-group">
                                                    <label> Expence Cost </label>
                                                    <input type="text" name="expenceCost" id="expenceCost" class="form-control" placeholder="Enter Expence Cost">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="updateExpence" class="btn btn-primary">Update Data</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <?php
                                if(isset($_POST['updateExpence']))
                                {   
                                    $id = $_POST['update_id'];
                                    
                                    $expenceName = mysqli_real_escape_string($conn, $_POST["expenceName"]);

                                    $expenceCost = mysqli_real_escape_string($conn, $_POST["expenceCost"]);

                                    $query = "UPDATE `expence` SET `expenceName`='$expenceName',`expenceCost`='$expenceCost' WHERE id = $id";

                                    $query_run = mysqli_query($conn, $query);

                                    if($query_run)
                                    {
                                        echo '<script> alert("Data Updated"); </script>';
                                        ?>
                                        <script>window.location.assign("./expence.php");</script>
                                        <?php
                                    }
                                    else
                                    {
                                        echo '<script> alert("Data Not Updated"); </script>';
                                    }
                                }
                            ?>

                            <!-- Delete Button -->
                            <td><a type="submit" href="./expence.php?id=<?php echo $data['0'] ?>" class="btn btn-danger">Delete</a></td>

                        </tr>
                    </tbody>
                    
                        <?php

                            };
                            };

                        ?>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {

        $('.editbtn').on('click', function () {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#expenceName').val(data[1]);
            $('#expenceCost').val(data[2]);
        });
    });
</script>

<?php 

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $query_remove = "DELETE FROM `expence` WHERE `id` = $id";

    mysqli_query($conn, $query_remove);

?>

<script>
    window.location.assign("./expence.php");
</script>

<?php
}
?>



<?php
    include_once("./include/footer.php");
?>