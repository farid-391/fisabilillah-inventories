<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fisabilillah Inventories</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php
include "../../connection.php";
session_start();

if($_SESSION["loggedIn"] != true){
    //echo 'not logged in';
    header('location:../../auth/login.php?returnmessage=not_loggedin');
    exit;
}

if(isset($_GET['searchbook'])){
	$search = $_GET['searchbook'];
	$sql = "SELECT books.id, books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
    books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
    LEFT JOIN categories ON books.category_id = categories.id 
    LEFT JOIN publishers ON books.publisher_id = publishers.id
    LEFT JOIN authors ON books.author_id = authors.id WHERE books.title LIKE '%".$search."%'";
    $query = mysqli_query($connection, $sql);		
}else{
    $sql = 'SELECT books.id, books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
    books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
    LEFT JOIN categories ON books.category_id = categories.id 
    LEFT JOIN publishers ON books.publisher_id = publishers.id
    LEFT JOIN authors ON books.author_id = authors.id;';
    $query = mysqli_query($connection, $sql);
}

$sqlbookcategories = 'SELECT * FROM categories';
$querybookcategories = mysqli_query($connection, $sqlbookcategories);

$sqlbookshelves = 'SELECT * FROM bookshelves';
$querybookshelves = mysqli_query($connection, $sqlbookshelves);

$sqlbookauthors = 'SELECT * FROM authors';
$querybookauthors = mysqli_query($connection, $sqlbookauthors);

$sqlbookpublishers = 'SELECT * FROM publishers';
$querybookpublishers = mysqli_query($connection, $sqlbookpublishers);

?>

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mosque"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Fisabilillah Inventories</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../inventory/index.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Inventories</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Book Collection</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user/index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullName']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../auth/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Book Collection</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 d-flex justify-content-between">
                        <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#bookModal">
                                    <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Add Data</button>
                            </div>
                            <div>
                                <a href="print/pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                                    class="fas fa-file-pdf fa-sm text-white-50"></i> PDF</a>
                                <a href="print/excell.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                    class="fas fa-file-excel fa-sm text-white-50"></i> Excell</a>
                                <a href="print/json.php" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-file fa-sm text-white-50"></i> Json</a>
                                <a href="print/xml.php" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                    class="fas fa-file fa-sm text-white-50" target="_blank"></i> XML</a>
                            </div>                        
                        </div>
                        <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                        action="book.php" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="Search for Book..."
                                aria-label="Search" aria-describedby="basic-addon2"
                                name="searchbook">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-sm btn-primary" value="Search">
                            </div>
                        </div>
                        </form> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php include "data.php"; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Row -->

                    <div class="row">
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Farid Afgar 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../auth/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary fw-bolder" id="bookModalLabel">Add Book</h5>
                <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><i class="fas fa-times fa-lg text-dark"></i></button>
            </div>
            <div class="modal-body modal-s">
                <form action="add.php" method="POST">
                    <div class="mb-3">
                        <label for="inputBookNumber" class="form-label">Number</label>
                        <input type="" class="form-control" id="inputBookNumber" name="inputBookNumber" placeholder="Book Number" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookTitle" class="form-label">Title</label>
                        <input type="" class="form-control" id="inputBookTitle" name="inputBookTitle" placeholder="Book Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookCategory" class="form-label">Category</label>
                        <select class="form-control" id="inputBookCategory" name="inputBookCategory"  aria-label="Default select example" required>
                            <option selected>Select Category</option>
                            <?php
                                while ($row = mysqli_fetch_array($querybookcategories)){
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookAuthor" class="form-label">Author</label>
                        <select class="form-control" id="inputBookAuthor" name="inputBookAuthor"  aria-label="Default select example" required>
                            <option selected>Select Author</option>
                            <?php
                                while ($row = mysqli_fetch_array($querybookauthors)){
                                    echo '<option value="'.$row['id'].'">'.$row['full_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookPublisher" class="form-label">Publisher</label>
                        <select class="form-control" id="inputBookPublisher" name="inputBookPublisher"  aria-label="Default select example" required>
                            <option selected>Select Publisher</option>
                            <?php
                                while ($row = mysqli_fetch_array($querybookpublishers)){
                                    echo '<option value="'.$row['id'].'">'.$row['full_name'].'</option>';
                                }
                            ?>
                        </select>
                    </div>      
                    <div class="mb-3">
                        <label for="inputBookYear" class="form-label">Year</label>
                        <input type="" class="form-control" id="inputBookYear" name="inputBookYear" placeholder="Publication Year" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookshelf" class="form-label">Bookshelf</label>
                        <select class="form-control" id="inputBookshelf" name="inputBookshelf" aria-label="Default select example" required>
                            <option selected>Select Bookshelf</option>
                            <?php
                                while ($row = mysqli_fetch_array($querybookshelves)){
                                    echo '<option value="'.$row['number'].'">'.$row['number'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputBookQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="inputBookQuantity" name="inputBookQuantity" placeholder="Book Quantity" required>
                    </div>                          
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>                
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

</body>

</html>