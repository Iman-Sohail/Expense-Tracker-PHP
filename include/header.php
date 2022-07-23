<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Expense Tracker</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            
            .top{
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            }

            .card_dashboard{
              display: flex;
              flex-direction: row;
              margin-top: 2rem;
              margin-bottom: 2rem;
              justify-content: space-around;
              align-items: center;
              flex-wrap: wrap;
            }

            .salary_card,
            .expense_card,
            .income_card{
              margin-top: 2rem;
              margin-bottom: 2rem;
              background: #fff;
              color: #000;
              border: 5px solid #0dcaf0;
              box-shadow: 10px 10px 15px #0dcaf0;
            /* padding: 4rem 3rem 4rem 3rem; */
             border-radius: 1.9rem;
              width: 260px;
              height: 160px;
              text-align: center;
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            }

            .addBalanceBtn{
              border-radius: 0.2rem;
              border: 2px solid #000;
              background: #fff;
              color: #000;
              padding: 0.5rem 1rem 0.5rem 1rem;
              transition: 250ms ease-in-out;
              text-decoration: none;
            }
            .addBalanceBtn:hover{
              background: #000;
              color: #fff;
              transition: 250ms ease-in-out;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index">Expense Tracker</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                   
                            <a class="nav-link" href="./expense">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Expenses
                            </a>

                            <a class="nav-link" href="./income">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Income
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">