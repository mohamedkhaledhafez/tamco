<?php
session_start();

include "connect.php";

/////////////////////// Add Employee ///////////////////////// 
if (isset($_POST['add_employee'])) {
    // Get variables from Form
    $employee_name          = $_POST['name'];
    $employee_position      = $_POST['position'];
    $employee_salary        = $_POST['salary'];

    // Check if Category is exist in Database
    $stmtx = $con->prepare("SELECT
                                name 
                            FROM 
                                employees 
                            WHERE 
                                name = ?");
    $stmtx->execute(array($employee_name));
    $status = $stmtx->rowCount();

    if ($status > 0) {
        $_SESSION['status'] = "This employee already exists !";
        $_SESSION['status_code'] = "error";
        header("Location: index.php?do=Add");
    } else {
        // Insert Employee Informations To Database
        $stmt = $con->prepare("INSERT INTO employees (name, position, salary)
                                                VALUES(:mname, :mposition, :msalary)");

        $stmt->execute(array(
            'mname' => $employee_name,
            'mposition' => $employee_position,
            'msalary' => $employee_salary
        ));

        $_SESSION['status'] = "A new employee has been added";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
    }
}


/////////////////////// Edit Employee ///////////////////////// 
if (isset($_POST['update_employee'])) {
    // Get variables from Form
    $employee_id     = $_POST['employee_id'];
    $employee_name          = $_POST['name'];
    $employee_position      = $_POST['position'];
    $employee_salary        = $_POST['salary'];

    // Insert Category Informations To Database
    $stmt = $con->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
    $stmt->execute(array($employee_name, $employee_position, $employee_salary, $employee_id));

    $_SESSION['status'] = "The employee has been modified";
    $_SESSION['status_code'] = "success";
    header("Location: index.php");
}

/////////////////////// Delete Employee ///////////////////////// 
if (isset($_POST['delete_employee'])) {
    $delete_empid     = $_POST['delete_empid'];

    $stmt = $con->prepare("DELETE FROM employees WHERE id = :mid ");
    $stmt->bindParam(":mid", $delete_empid);
    $stmt->execute();

    $_SESSION['status'] = 'The employee has been deleted';
    $_SESSION['status_code'] = "success";

    header('location:index.php');
}
