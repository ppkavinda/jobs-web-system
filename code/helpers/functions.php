<?php
function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function isLoggedIn () {
	if (isset($_SESSION['user_id'])) {
		return true;
	} else {
		return false;
	}
}

function isEmployee () {
	if (isset ($_SESSION['role'])){
		if ($_SESSION['role'] == 3){
			return true;
		} else {
			return false;
		}
	}
}

function adminOnly () {
	if ( $_SESSION['role'] != 1) {
		header("location:javascript://history.go(-1)");
	}
}

function regUserOnly () {
	if (!isLoggedIn()) {
		header("Location: ../main/login.php");
	}
}

function guestOnly () {
	if (isLoggedIn()) {
		header("location:javascript://history.go(-1)");
	}
}