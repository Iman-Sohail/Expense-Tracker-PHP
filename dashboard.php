<?php

    include_once("./include/conn.inc.php");
    include_once("./include/header.php");

    error_reporting(0);
    
    // INCOME PHP CODE START
    $income = "SELECT SUM(income) AS Income FROM income";

    $result_income = mysqli_query($conn, $income);
    
    if (mysqli_num_rows($result_income)) {
        while ($data = mysqli_fetch_array($result_income)) {
            $inc = $data['0'];
        }
    }
    // INCOME PHP CODE END

    ?>
<main>

<div class="top">
    <h1 class="mt-4 text-center">Dashboard</h1>

        <!-- Button trigger Income Modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#incomeModal">
            Add Income
        </button>

        <!-- Income Modal Start -->
        <div class="modal fade" id="incomeModal" tabindex="-1" aria-labelledby="incomeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="incomeModalLabel">Add Income</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" class="text-center mt-2">
                        <div class="modal-body">

                            <input type="text" name="incomeName" placeholder="Income Name">
                            <input type="number" name="Income" placeholder="Income">
                            
                        </br>
                            
                            <!-- <input type="submit" name="submit" class="mt-2 addBalanceBtn" id="disable_btn" onClick="dis_btn()" value="Add Balance"> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Add Income</button> -->
                            <input type="submit" name="incomeSubmit" class="mt-2 addBalanceBtn" value="Add Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

            if (isset($_POST["incomeSubmit"])) {
                
                $incomeName = mysqli_real_escape_string($conn, $_POST["incomeName"]);
                $income = mysqli_real_escape_string($conn, $_POST["Income"]);
                $timestamp = date('d-m-Y h:i:s');
                // $query = "INSERT INTO `balance`(`id`, `Salary`) VALUES (NULL,'$balance')";
                $query = "INSERT INTO `income`(`id`, `incomeName`, `income`, `Date&Time`) VALUES (NULL,'$incomeName','$income','$timestamp')";
                
                $result = mysqli_query($conn, $query);

                ?>

            <script>window.location.assign("dashboard")</script>

        <?php
            }
        ?>
        <!-- Income Modal End -->

        </br>

        <!-- Button trigger expense Modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#expenseModal">
            Add Expense
        </button>

        <!-- expense Modal Start -->
        <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseModalLabel">Add Expense</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post" class="text-center mt-2">
                        <div class="modal-body">

                            <input type="text" name="expenseName" placeholder="Expense Name">
                            <input type="number" name="expenseCost" placeholder="Expense Cost">
                            
                        </br>
                            
                            <!-- <input type="submit" name="submit" class="mt-2 addBalanceBtn" id="disable_btn" onClick="dis_btn()" value="Add Balance"> -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Add Income</button> -->
                            <input type="submit" name="expenseSubmit" class="mt-2 addBalanceBtn" value="Add Data">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

            if (isset($_POST["expenseSubmit"])) {
                
                $expenseName = mysqli_real_escape_string($conn, $_POST["expenseName"]);
                $expenseCost = mysqli_real_escape_string($conn, $_POST["expenseCost"]);
                $timestamp = date('d-m-Y h:i:s');
                // $query = "INSERT INTO `balance`(`id`, `Salary`) VALUES (NULL,'$balance')";
                // $query = "INSERT INTO `income`(`id`, `incomeName`, `income`, `Date&Time`) VALUES (NULL,'$incomeName','$income','$timestamp')";
                $query = "INSERT INTO `expense`(`id`, `expenseName`, `expenseCost`, `Date&Time`) VALUES (NULL,'$expenseName','$expenseCost','$timestamp')";
                
                $result = mysqli_query($conn, $query);

                ?>

            <script>window.location.assign("dashboard")</script>

        <?php
            }
        ?>
        <!-- expense Modal End -->

        <!-- <button type="submit" class="mt-2 addBalanceBtn" id="disable_btn" onClick="dis_btn()">Add Balance</button> -->

        <!-- <script>
            function dis_btn() {
                var bt=document.getElementById("disable_btn");
                bt.disabled=true;
                document.getElementById("disable_btn").style.background='#000000';
                document.querySelector("#disable_btn").value = 'Disabled';
            }
        </script> -->
</div>

    <div class="card_dashboard">

        <div class="salary_card">
            <h6>Total Balance</h6>
            <h3 class="salary">
                <?php 
                // $query = "SELECT * FROM Balance ORDER BY id ASC LIMIT 1";
                $query = "SELECT SUM(income) AS Income FROM income";
                

                $result_balance = mysqli_query($conn, $query);

                if (mysqli_num_rows($result_balance)) {
                    while ($data = mysqli_fetch_array($result_balance)) { 
                        $bal = $data['1'];
                        echo $totalBalance = $inc + $bal;
                    }
                }
                ?>
            </h3>
        </div>

        <div class="expense_card">
            <h6>Remaining Balance</h6>
            <h3 class="expense">
            <?php 

                $expense = "SELECT SUM(expenseCost) AS TotalExpenseCost FROM expense";

                $result_expense = mysqli_query($conn, $expense);

                if (mysqli_num_rows($result_expense)) {
                    while ($data = mysqli_fetch_array($result_expense)) { 
                        $val1 = $data['0'];

                        echo $totalBalance - $val1;
                    }
                }
                ?> 
            </h3>
        </div>
        <!-- Income Card Start -->
        <div class="income_card">
            <h6>Recent Income</h6>
            <h3>
                <?php

                    // INCOME PHP CODE START
                    $income = "SELECT * FROM `income` ORDER BY id DESC LIMIT 1";

                    $result_income = mysqli_query($conn, $income);

                    if (mysqli_num_rows($result_income)) {
                        while ($data = mysqli_fetch_array($result_income)) {
                            echo $inc = $data['2']; 
                        }
                    }
                    // INCOME PHP CODE END

                ?>
            </h3>
        </div>
        <!-- Income Card End -->
    </div>


    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-xl-12 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Expense Tracker</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="./expense">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-xl-12 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Income Tracker</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="./income">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <h2 class="text-center">Remaining</h2>
    <h3 class="text-center">• understand the code and then edit it</h3>
    <h3 class="text-center">• addincome and add expense file</h3>
    <h3 class="text-center">• either stop balance or allow adding more blance or allow to delete previous balance</h3> -->
</main>


<?php

    include_once("./include/footer.php");

?>