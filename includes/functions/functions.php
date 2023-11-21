<?php

/**
 ** Get All Function 
 ** [Function To Get All Records From any table 
 */

function get_all($field, $tableName, $where, $and, $orderField, $ordering = "ASC")
{

    global $con;

    $getAll = $con->prepare("SELECT $field FROM $tableName $where $and ORDER BY $orderField $ordering");

    $getAll->execute();

    $all = $getAll->fetchAll();

    return $all;
}

/**
 * Title function that echo the page title in case the page has a variable  $pageTitle 
 * and echo default title for other pages
 */

function echoTitle()
{

    global $pageTitle;

    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "Default";
    }
}


/*
  * Home Redirect Function
  * [This Function accept parameters] 
  * $theMsg   = Echo a message [Error | Success | Warning | any message]
  * $url      = The Link You Want To Redirect To
  * $seconds  = Seconds before Redircting to home page
*/

function redirectHome($theMsg, $url = null, $seconds = 0)
{

    if ($url === null) {

        $url  = 'index.php';
        $link = 'Home';
    } else {

        if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {

            $url  = $_SERVER['HTTP_REFERER'];
            $link = "Previous";
        } else {

            $url = 'index.php';
            $link = "Home";
        }
    }

    echo $theMsg;

    // Redirect to Home page (index page) => [url=index.php]
    header("refresh:$seconds;url=$url");

    // To exit and dont execute any code after header()
    exit();
}
