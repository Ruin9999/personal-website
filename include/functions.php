<?php
function user_logged_in() {
    return (isset($_SESSION['u_username'])) ? true : false;
}

function admin_logged_in() {
    return (isset($_SESSION['a_number'])) ? true : false;
}

function protect_page() {
    if(user_logged_in() === false) {
        header("Location: ../login.php?");
        exit();
    }
}

function protect_page_admin() {
    if(admin_logged_in() === false) {
        header("Location: ../index.php?");
        exit();
    }
}
?>
