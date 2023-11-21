<?php

ob_start();
session_start();
include 'init.php';

$pageTitle = 'Employees';

$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
// Start Manage Page
if ($do == 'Manage') {  // Manage Employees Page 
?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>
                <h1><?php echo $pageTitle ?></h1>
            </h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Messages -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <a href="index.php?do=Add" class="btn btn-success add_btn"><i class="bx bxs-user-plus"></i>
                                        Add Employee</a>
                                    <h2 class="card-title fw-bold"><?php echo $pageTitle ?></h2>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Position</th>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $employees = get_all("*", "employees", "", "", "id", "ASC");
                                            foreach ($employees as $employeey) { ?>
                                                <tr>
                                                    <th scope="row"><a href="#">#<?php echo $employeey['id']; ?></a></th>
                                                    <td><?php echo $employeey['name']; ?></td>
                                                    <td><?php echo $employeey['position']; ?></td>
                                                    <td><?php echo $employeey['salary']; ?></td>
                                                    <td class="employee_actions">
                                                        <a class="btn btn-success" href="index.php?do=Edit&empid=<?php echo $employeey['id'] ?>">
                                                            <i class="bx bxs-edit"></i> Edit
                                                        </a>
                                                        <form action="actions.php" method="post" style="display: inline-block !important;">
                                                            <input type="hidden" name="delete_empid" value="<?php echo $employeey['id'] ?>">
                                                            <button type="submit" name="delete_employee" onclick="return confirm('Want to delete this employee ?')" class="btn btn-danger">
                                                                <i class="bx bxs-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->
<?php
} elseif ($do == 'Add') {

    $pageTitle = 'Add Employee';
?>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>
                <h1><?php echo $pageTitle ?></h1>
            </h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Start Messages -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Messages -->
                        <div class="col-lg-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="card-body">
                                    <h2 class="card-title fw-bold"><?php echo $pageTitle ?></h2>

                                    <form class="form-horizontal" action="actions.php" method="POST" enctype="multipart/form-data">
                                        <!--Start Username Field-->
                                        <div class="form-group  form-group-lg mb-4">
                                            <div class="col-sm-10 col-md-10">
                                                <input type="text" name="name" class="form-control" placeholder="Enter The Employee Name" autocomplete="on" required="required" />
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Name</label>
                                        </div>
                                        <!--End Username Field-->

                                        <!--Start Position Field-->
                                        <div class="form-group  form-group-lg mb-4">
                                            <div class="col-sm-10 col-md-10">
                                                <input type="text" name="position" class="form-control" placeholder="Enter The Employee Position" required="required" />
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Position</label>
                                        </div>
                                        <!--End Position Field-->

                                        <!--Start Salary Field-->
                                        <div class="form-group  form-group-lg mb-4">
                                            <div class="col-sm-10 col-md-10">
                                                <input type="number" name="salary" class="form-control" placeholder="Enter The Employee Salary" required="required" />
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Salary</label>
                                        </div>
                                        <!--End Salary Field-->

                                        <!--Start Submit Field-->
                                        <div class="form-group  form-group-lg">
                                            <div class=" col-sm-10">
                                                <input type="submit" name="add_employee" value="Add" class="btn btn-primary btn-lg" />
                                            </div>
                                        </div>
                                        <!--End Submit Field-->
                                    </form>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Messages -->

            </div>
        </section>

    </main><!-- End #main -->
    <?php } elseif ($do == 'Edit') {
    $pageTitle = "Edit Employee";

    // Check if Get request UserId is numeric & get its integer value 
    $empid = isset($_GET['empid']) && is_numeric($_GET['empid']) ? intval($_GET['empid']) : 0;  // intval => integer value

    // Select all data in database that depend on this userId 
    $stmt = $con->prepare("SELECT * FROM employees WHERE id = ?");

    // Execute query
    $stmt->execute(array($empid));
    // Fetch the data
    $row = $stmt->fetch();
    // The row count that prove that there is a record in database with this userId
    $rowsCount = $stmt->rowCount();

    // If thre is such userId, Show the Form
    if ($rowsCount > 0) {
    ?>
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>
                    <h1><?php echo $pageTitle ?></h1>
                </h1>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Start Messages -->
                    <div class="col-lg-12">
                        <div class="row">

                            <!-- Recent Messages -->
                            <div class="col-lg-12">
                                <div class="card recent-sales overflow-auto">

                                    <div class="card-body">
                                        <h2 class="card-title fw-bold"><?php echo $pageTitle ?></h2>

                                        <form class="col-md-9 form-horizontal" action="actions.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="employee_id" value="<?php echo $empid ?>">

                                            <!--Start Username Field-->
                                            <div class="form-group  form-group-lg mb-4">
                                                <div class="col-sm-10 col-md-10">
                                                    <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="Enter The Employee Name" autocomplete="on" required="required" />
                                                </div>
                                                <label class="col-sm-2 control-label">Employee Name</label>
                                            </div>
                                            <!--End Username Field-->

                                            <!--Start Position Field-->
                                            <div class="form-group  form-group-lg mb-4">
                                                <div class="col-sm-10 col-md-10">
                                                    <input type="text" name="position" class="form-control" value="<?php echo $row['position'] ?>" placeholder="Enter The Employee Position" required="required" />
                                                </div>
                                                <label class="col-sm-2 control-label">Employee Position</label>
                                            </div>
                                            <!--End Position Field-->

                                            <!--Start Salary Field-->
                                            <div class="form-group  form-group-lg mb-4">
                                                <div class="col-sm-10 col-md-10">
                                                    <input type="number" name="salary" class="form-control" value="<?php echo $row['salary'] ?>" placeholder="Enter The Employee Salary" required="required" />
                                                </div>
                                                <label class="col-sm-2 control-label">Employee Salary</label>
                                            </div>
                                            <!--End Salary Field-->

                                            <!--start Submit Field-->
                                            <div class="form-group  form-group-lg">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="submit" name="update_employee" value="Update" class="btn btn-primary btn-lg" />
                                                </div>
                                            </div>
                                            <!--End Submit Field-->
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Recent Sales -->
                        </div>
                    </div><!-- End Messages -->
                </div>
            </section>
        </main><!-- End #main -->
<?php
    } else {
        echo "<div class='container'>";

        $theMsg = '<div class="alert alert-danger">There is no employee with this ID</div>';

        redirectHome($theMsg, 'back', 5);

        echo "</div>";
    }
}
include $templates . 'footer.php';
ob_end_flush();
?>