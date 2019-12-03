<?php

include_once 'user.php';
include_once 'card.php';
include_once 'master.php';
include_once 'dbconfig.php';
include_once 'methods.php';
include_once 'trips.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $userTypes = getUserTypes($conn);
    $tripTypes = getTripTypes($conn);
    $usersWithoutCard = getAllUsersWithoutCards($conn);
    $allTripTypes = getAllTripDetails($conn);
    $blockRequests = getCardBlockRequests($conn);
    

    if (isset($_POST['login'])){login($conn);}
    if (isset($_POST['create'])){ createUser($conn); }
    if (isset($_POST['updateUser'])){ updateUserDetails($conn); header("Location: ../pages/viewUpdateUserUI.php");}
    if (isset($_POST['updateAdmin'])){ updateUserDetails($conn); header("Location: ../pages/viewUpdateAdminUI.php");}
    if (isset($_POST['updateAdminPassword'])){ updatePassword($conn);  header("Location: ../pages/viewUpdateAdminUI.php");}
    if (isset($_POST['updateUserPassword'])){ updatePassword($conn); header("Location: ../pages/viewUpdateUserUI.php");}
    if (isset($_POST['generate'])){generateCard($conn);}
    if (isset($_POST['updatefare'])){updateFare($conn);}
    if (isset($_POST['report'])){cardBlockRequest($conn);}
    if (isset($_POST['deactivate'])){deactivateCard($conn);}
    if (isset($_POST['reloadCard'])){reloadCard($conn);}
    
} catch (SQLExecption $error) {
    echo $conn->Error[2];
}

?>
