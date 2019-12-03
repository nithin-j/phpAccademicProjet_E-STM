<?php


function getAllUserTypes($conn){
    $counter = 0;
    $query = "SELECT * FROM UserTypes";
    foreach($conn->query($query) as $value){
        $userTypes[$counter++] = $value["UserTypeName"];
    }
    return $userTypes;
}

function getAllTripTypes($conn){
    $counter = 0;
    $query = "SELECT * FROM TripTypes";
    foreach($conn->query($query) as $value){
        $tripTypes[$counter++] = $value["TripType"];
    }
    return $tripTypes;
}

function getAllUsersWithoutCard($conn){
    $counter = 0;
    $users =[];
    $query = "SELECT u.UserID, u.Name, ut.UserTypeName, u.PhoneNumber, u.StreetAddress, u.City, u.ZipCode 
    FROM users u INNER JOIN usertypes ut ON u.UserTypeID = ut.UserTypeID 
    WHERE u.UserTypeID != ? AND u.UserID NOT IN (SELECT DISTINCT UserID FROM cards)";
    
    $prepare = $conn->prepare($query);
    $prepare->execute([1]);
    $temp = $prepare->fetchAll();
    foreach($temp as $value){
        $userObj = new User();
        $userObj->setUserID($value['UserID']);
        $userObj->setName($value['Name']);
        $userObj->setUserType($value['UserTypeName']);
        $userObj->setPhone($value['PhoneNumber']);
        $userObj->setStreetAddress($value['StreetAddress']);
        $userObj->setCity($value['City']);
        $userObj->setZipCode($value['ZipCode']);
        $users[$counter++] = $userObj;
    }
    return $users;
}

function getAllTripTypeDetails($conn){

    $counter = 0;
    $allTripTypes =[];
    $query = "SELECT * FROM TripTypes";
    
    foreach ($conn->query($query) as $value) {
        $tripObj = new Trips();
        $tripObj->setTripTypeID($value["TripTypeID"]);
        $tripObj->setTripType($value["TripType"]);
        $tripObj->setFare($value["Fare"]);
        $allTripTypes[$counter++]=$tripObj;
    }
    return $allTripTypes;
}


function getAllCardBlockRequests($conn){

    $counter = 0;
    $requests =[];
    $query = "SELECT c.UserID,dc.CardNumber,dc.Remarks FROM deactivatecards dc INNER JOIN cards c ON c.CardNumber = dc.CardNumber  WHERE IsActive = ?";
    
    $prepare = $conn->prepare($query);
    $prepare->execute([1]);
    $temp = $prepare->fetchAll();
    foreach($temp as $value){
        $cardObj = new Card();
        $cardObj->setUserID($value['UserID']);
        $cardObj->setCardNumber($value['CardNumber']);
        $cardObj->setRemarks($value['Remarks']);
        $requests[$counter++] = $cardObj;
    }
    return $requests;
}



?>