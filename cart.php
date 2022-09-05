<?php
session_start();

if (empty($_SESSION['email']) && empty($_SESSION['password'])) {
	header("location: main.php?page=login&alert=2");
    die;
    // echo "<meta http-equiv='refresh' content='0; url=main.php?page=login&alert=2'>";
}

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // $ref = $_GET['ref'];

    if ($act == "add") {
        if (isset($_GET['id_dimsum'])) {
            $id_dimsum = $_GET['id_dimsum'];
            if (isset($_SESSION['cart'][$id_dimsum])) {
                $_SESSION['cart'][$id_dimsum] += 1;
            } else {
                $_SESSION['cart'][$id_dimsum] = 1;
            }
            // echo "<meta content='0; url=main.php?page=menu&alert=1' http-equiv='refresh'>";
            header("location: main.php?page=produk&alert=1");
        }
    } elseif ($act == "plus") {
        if (isset($_GET['id_dimsum'])) {
            $id_dimsum = $_GET['id_dimsum'];
            if (isset($_SESSION['cart'][$id_dimsum])) {
                $_SESSION['cart'][$id_dimsum] += 1;
            }
        }
        // echo "<meta content='0; url=main.php?page=keranjang' http-equiv='refresh'>";
        header("location: main.php?page=keranjang");
    } elseif ($act == "minus") {
        if (isset($_GET['id_dimsum'])) {
            $id_dimsum = $_GET['id_dimsum'];
            if (isset($_SESSION['cart'][$id_dimsum]) && $_SESSION['cart'][$id_dimsum] != 1) {
                $_SESSION['cart'][$id_dimsum] -= 1;
            }
        }
        // echo "<meta content='0; url=main.php?page=keranjang' http-equiv='refresh'>";
        header("location: main.php?page=keranjang");
    } elseif ($act == "del") {
        if (isset($_GET['id_dimsum'])) {
            $id_dimsum = $_GET['id_dimsum'];
            if (isset($_SESSION['cart'][$id_dimsum])) {
                unset($_SESSION['cart'][$id_dimsum]);
            }
            // echo "<meta content='0; url=main.php?page=keranjang&alert=1' http-equiv='refresh'>";
            header("location: main.php?page=keranjang&alert=2");
        }
    }
}
