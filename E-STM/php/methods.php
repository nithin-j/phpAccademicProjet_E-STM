

<?php

session_start();

//user.php
function login($conn){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($username,$password);
    $isValid = $user->login($conn);

    if ($isValid) {
        $_SESSION['user'] = $user;

        if ($user->getUserType() == 1) {
            header("Location: ../pages/adminUI.php");
        }else{
            Card::removeExpiredPayments($conn);
            header("Location: ../pages/userUI.php");
        }

    }else{
        echo "username or password is wrong";
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: ../index.php");
}

function createUser($conn){
    $id = $_POST['userType'];
    $user = $_SESSION['user'];

    move_uploaded_file($_FILES['file']['tmp_name'],"../images/profilepicture/".$_FILES['file']['name']);
    $newuser = new User("", $_POST['pass'], $_POST['name'], $_POST['phone'], $_POST['userType'],"","","", $_FILES['file']['name']);

    $create = $newuser->createUser($conn,$id);

    if ($create) {
        $_SESSION['user'] = $user;
        header("location: " . $_SERVER['PHP_SELF']);
    }
}

function updateUserDetails($conn){
    $user = $_SESSION['user'];

    $user->setName($_POST['name']);
    $user->setStreetAddress($_POST['street']);
    $user->setPhone($_POST['phno']);
    $user->setZipCode($_POST['zipcode']);
    $user->setCity($_POST['city']);
    
    $update = $user->updateUserDetails($conn);
    
}

function updatePassword($conn){
    $user = $_SESSION['user'];

    $currentpass = $_POST['oldpwd'];
    $newpass = $_POST['newpwd'];
    $confmpass = $_POST['confmpwd'];

    if ($user->getPassword() == $currentpass) {
        if ($newpass == $confmpass) {
            $user->setPassword($newpass);
            $update = $user->updatePassword($conn);
        }
        else{
            echo"Passwords entered doesnot match. Please verify and try again";
        }
    }
    else{
        echo"Password entered is wrong. Please enter the correct password and try";
    }
}

function updateFare($conn){
    $user = $_SESSION['user'];
    
    $fare = $_POST['fare'];
    $tripType = $_POST['triptype'];
    
    $update = $user->updateFare($conn,$fare,$tripType);
    if($update){
        echo("Fare is updated for trip type: $tripType");
        header("location: " . $_SERVER['PHP_SELF']);
       
    }
    else{
        echo("Couldnot update fare. Please try again");
    }
    
}

//card.php
function generateCard($conn){
    $user = $_SESSION['user'];
    $card = new Card("", $_POST['userid'], $_POST['tripType']);

    $generate = $card->generateCard($conn);
    
    if ($generate) {
        header("location: " . $_SERVER['PHP_SELF']);
        echo("Card details has been added for the seleted user.");

    }
    else{
        echo("Couldnot create card.");
    }
    
}

function cardBlockRequest($conn){
    $user= $_SESSION['user'];
    $userID = $user->getUserID();
    $card = new Card("", $userID,"");
    $remarks = $_POST['remarks'];
    $request = $card->cardBlockRequest($conn,$remarks);
    if($request){
        header("location: " . $_SERVER['PHP_SELF']);
        echo("Card block request placed successfully.");
    }
    else{
        echo("Couldnot place card block request.");
    }
}

function deactivateCard($conn){
    $cardNumber = $_POST['cardnumber'];
    $card = new Card($cardNumber,"","");

    $dectivate = $card->deactivateCard($conn);
    if($dectivate){
        header("location: " . $_SERVER['PHP_SELF']);
        echo("Card is blocked.");
    }
    else{
        echo("Couldnot execute the card block request.");
    }
}

function reloadCard($conn){
    $id = $_POST['triptype'];
    $user= $_SESSION['user'];
    $userID = $user->getUSerID();
    $card = new Card("", $userID,"");
    $card->getCardDetails($conn);
    $reload = $card->reloadCard($conn,$id);

    if($reload){
        header("location: " . $_SERVER['PHP_SELF']);
        echo("Card is recharged.");
    }
    else{
        echo("Cannot reload the card at the moment.");
    }
}
//master.php

function getUserTypes($conn){
    
    $allUserTypes = getAllUserTypes($conn);
    return $allUserTypes;
}

function getTripTypes($conn){
    $allTripTypes = getAllTripTypes($conn);
    return $allTripTypes;
}

function getAllUsersWithoutCards($conn){
    $usersWithoutCard = getAllUsersWithoutCard($conn);
    return $usersWithoutCard;
}


function getAllTripDetails($conn){
    $listTripTypes = getAllTripTypeDetails($conn);
    return $listTripTypes;
    
}

function getCardBlockRequests($conn){
    $blockRequests = getAllCardBlockRequests($conn);
    return $blockRequests;
    
}


?>