<?php
session_start();
ob_start();
$status = session_status();
require('db_config.php');
if ($status == PHP_SESSION_NONE) {

    echo "session not start";
    session_start();
}
if (!isset($_SESSION['name'])) {
    header('location:login.php');
}
$id = $_SESSION['id'];

$role=$_SESSION['role'];

$username=$_SESSION['name'];

if($role!='admin')
{
    $sql="Select*from employee";
}
else
{
    $sql="Select * from login";
}
$ures = mysqli_query($db,$sql);
$urow = mysqli_fetch_assoc($ures);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Datum | CRM Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/fontawesome/css/brands.css">
    <link rel="stylesheet" href="assets/fontawesome/css/solid.css">
    <link rel="stylesheet" href="assets/fontawesome/css/regular.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    


    <?php
    require_once 'db_config.php';

    ?>
    <style>
        .dropbtn {
            background-color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-right: 20px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: -70px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;

        }

        .dropdown:hover .dropdown-content {
            display: block;

        }
    </style>
</head>

<body class="  ">

    <div class="wrapper">
        <div class="iq-sidebar  sidebar-default  ">
            <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
                <a href="index.html" class="header-logo">
                    <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="assets/images/logo-dark.png" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                    <span>Datum</span>
                </a>
                <div class="side-menu-bt-sidebar-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="side-menu">
                        <li class="active sidebar-layout">
                            <a href="index.php" class="svg-icon">
                                <i class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </i>
                                <span class="ml-2">Dashboard</span>
                                <p class="mb-0 w-10 badge badge-pill badge-primary">6</p>
                            </a>
                        </li>
                        <li class="px-3 pt-3 pb-2">
                            <span class="text-uppercase small font-weight-bold">Pages</span>
                        </li>

                        <li class="sidebar-layout">
                            <a href="#app1" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </i>
                                <span class="ml-2">User information</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right " width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app1" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=" sidebar-layout">
                                    <a href="createuser.php" class="svg-icon">
                                        <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                            </svg>
                                        </i><span class="">Create User</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout">
                                    <a href="usertable.php" class="svg-icon">
                                        <i class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                            </svg>
                                        </i><span class="">User Information</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <?php
                        if($role=='admin')
                        {
                        ?>
                        <li class="sidebar-layout">
                            <a href="#app6" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </i>
                                <span class="ml-2">Employee information</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app6" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=" sidebar-layout">
                                    <a href="createemployee.php" class="svg-icon">
                                        <i class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </i>
                                        <span class="ml-2">Designation</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout">
                                    <a href="employeeinfo.php" class="svg-icon">
                                        <i class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414" />
                                            </svg>
                                        </i>
                                        <span class="ml-2">Employee info</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
             

                        <li class="sidebar-layout">
                            <a href="#app3" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i>
                                    <svg class="svg-icon" id="iq-form-1" width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" style="stroke-dasharray: 74, 94; stroke-dashoffset: 0;"></path>
                                    </svg>
                                </i>
                                <span class="ml-2">Expense information</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app3" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="sidebar-layout">
                                    <a href="employesalary.php" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" width="18" id="iq-form-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" style="stroke-dasharray: 61, 81; stroke-dashoffset: 0;"></path>
                                            </svg>
                                        </i>
                                        <span class="">Employee Salary</span>
                                    </a>

                                </li>
                                <li class="sidebar-layout">
                                    <a href="salaryinfo.php" class="svg-icon">

                                        <svg class="svg-icon" width="18" id="iq-user-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>

                                        <span class="">Salary Info</span>


                                    </a>

                                </li>
                                <li class="sidebar-layout">
                                    <a href="designation.php" class="svg-icon">

                                        <svg class="svg-icon" width="18" id="iq-user-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>

                                        <span class="">Desgnation Management</span>


                                    </a>

                                </li>
                                <li class="sidebar-layout">
                                    <a href="expense.php" class="svg-icon">

                                    <svg class="svg-icon" id="iq-form-1" width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" style="stroke-dasharray: 74, 94; stroke-dashoffset: 0;"></path>
                                    </svg>

                                        <span class="">Other Expenditures</span>


                                    </a>

                                </li>

                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="sidebar-layout">
                            <a href="#app2" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i>
                                    <svg class="svg-icon" id="iq-ui-1" width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" style="stroke-dasharray: 97, 117; stroke-dashoffset: 0;"></path>
                                    </svg>
                                </i>
                                <span class="ml-2">Income information</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app2" class="submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class=" sidebar-layout">
                                    <a href="addbill.php" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" id="iq-ui-1-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" style="stroke-dasharray: 90, 110; stroke-dashoffset: 0;"></path>
                                            </svg>
                                        </i>
                                        <span class="">Add Bill</span>
                                    </a>
                                </li>


                                <li class=" sidebar-layout">
                                    <a href="billinfo.php" class="svg-icon">
                                        <i class="">
                                            <svg class="svg-icon" width="18" id="iq-ui-1-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" style="stroke-dasharray: 56, 76; stroke-dashoffset: 0;"></path>
                                            </svg>
                                        </i><span class="">Bill Info</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-layout">
                            <a href="#app5" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </i>
                                <span class="ml-2">Pakage information </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <ul id="app5" class="submenu collapse" data-parent="#iq-sidebar-toggle">

                                <li class=" sidebar-layout">
                                    <a href="package.php" class="svg-icon">
                                        <i class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                            </svg>
                                        </i>
                                        <span class="ml-2">Pakage info</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="manageuser.php" class="svg-icon">
                                <i class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </i><span class="ml-2">Manage User</span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <div class="pt-5 pb-5"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="side-menu-bt-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                        <span class="bg-primary"></span>
                                    </a>

                                <li class="nav-item nav-icon search-content">
                                    <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="svg-icon text-secondary" id="h-suns" height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                        <form action="#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                                <a href="#" class="search-link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="assets/images/user/1.jpg" class="img-fluid avatar-rounded" alt="user">

                                    </a>

                                </li>
                                <div class="dropdown">
                                    <button class="dropbtn"><?php echo $username ?></button>
                                    <div class="dropdown-content">

                                        <li class="dropdown-item  d-flex svg-icon border-top">
                                            <button type='button' class='btn upd-user-btn' data-bs-toggle='modal' data-bs-target='#upd_login' style='padding: 10px 10px 10px 10px;' data-id='<?php echo $id ?>'>
                                                <svg class="svg-icon" id="iq-ui-1-0" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" style="stroke-dasharray: 90, 110; stroke-dashoffset: 0;"></path>
                                                </svg>
                                                Update Profile
                                            </button>
                                        </li>

                                        <li class="dropdown-item  d-flex svg-icon border-top">
                                            <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <a href="logout.php">Logout</a>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="content-page">
            <!-- Edit Modal -->
            <div class="modal fade" id="upd_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff;border: none;font-size: 27px;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="" name="upd_name" require value="<?php echo $username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label" required> Old Password:(Leave if don't want to update)</label>
                                    <input class="form-control" type="password" require value="" name="opass" id=""></input>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label" require> New Password:(Leave if don't want to update)</label>
                                    <input class="form-control" type="password" require value="" name="pass" id=""></input>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Confirm Password:</label>
                                    <input type="password" class="form-control" id="" name="c_pass"></input>
                                </div>

                               

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="usubmit" >Update</button>
                            </div>
                        </form>
                        <?php
                        
           if(isset($_POST['usubmit'])) {
              
                $p_name = $_POST['upd_name'];
                $o_pass = $_POST['opass'];
                $p_pass = $_POST['pass'];
                $p_cpass = $_POST['c_pass'];
               
               
                if($o_pass=='')
                {
                    if($role!='admin')
                    {
                        
                        $updq = "UPDATE `employee` SET `name`='$p_name' WHERE ID=$id";
                    }
                    else
                    {
                      
                    $updq = "UPDATE `login` SET `name`='$p_name' WHERE ID=$id";
                    }
                    $upres = mysqli_query($db, $updq);
                    if ($upres) {
                        echo '  <script>
                                        alert("Name Updated")
                                    </script>';
                    } else {
                        echo '  <script>
                                        alert("Some Error Occured")
                                    </script>';
                    }


                }
                else
                {
                $Password_original = $urow['password'];
                if ($o_pass == $Password_original) {
                    if ($p_pass == $p_cpass) {
                        if($role!='admin')
                    {
                        $updq = "UPDATE `employee` SET `name`='$p_name',`password`='$p_pass' WHERE ID=$id";
                    }
                    else
                    {
                        $updq = "UPDATE `login` SET `name`='$p_name',`password`='$p_pass' WHERE ID=$id";
                    }
                        $upres = mysqli_query($db, $updq);
                        if ($upres) {
                            echo '  <script>
                                            alert("Profile Updated")
                                        </script>';
                        } else {
                            echo '  <script>
                                            alert("Some Error Occured")
                                        </script>';
                        }
                    } else {
                        echo '  <script>
                                            alert("Password and Confirm Password Missmatched")
                                        </script>';
                    }
                } else {
                    echo '  <script>
                                        alert("Wrong Password")
                                    </script>';
                }
            }
        }

            ?>
                    </div>
                </div>
            </div>

           