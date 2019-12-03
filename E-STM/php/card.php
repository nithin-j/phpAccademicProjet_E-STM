<?php

class Card{

    private $cardNumber;
    private $userID;
    private $tripType;
    private $remarks;
    private $validity;

    

    /**
     * Get the value of cardNumber
     */ 
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set the value of cardNumber
     *
     * @return  self
     */ 
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get the value of userID
     */ 
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set the value of userID
     *
     * @return  self
     */ 
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

    
    /**
     * Get the value of tripType
     */ 
    public function getTripType()
    {
        return $this->tripType;
    }

    /**
     * Set the value of tripType
     *
     * @return  self
     */ 
    public function setTripType($tripType)
    {
        $this->tripType = $tripType;

        return $this;
    }

    /**
     * Get the value of remarks
     */ 
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * Set the value of remarks
     *
     * @return  self
     */ 
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * Get the value of validity
     */ 
    public function getValidity()
    {
        return $this->validity;
    }

    /**
     * Set the value of validity
     *
     * @return  self
     */ 
    public function setValidity($validity)
    {
        $this->validity = $validity;

        return $this;
    }

    public function __construct($cardNumber = null, $userID = null, $tripType = null, $validity = null){
        $this->cardNumber = $cardNumber;
        $this->userID = $userID;
        $this->tripType = $tripType;
    }

    public function generateCard($conn){
        
        $date= (date("Y")+1)."-10-30";
        $query = "INSERT INTO cards (UserID, TripTypeID, StatusCode, IsValid, ExpiryDate) VALUES ($this->userID, $this->tripType, 1, 1, '$date')";
        $result = $conn->exec($query);
        return $result;
        
    }

    public function removeExpiredPayments($conn){
        $date = date("Y-m-d");
        $query = "DELETE FROM payments WHERE ValidTo < '$date'";
        $result = $conn->exec($query);
        return $result;
    }

    public function getCardDetails($conn){
        
        $query = "SELECT c.UserID,c.CardNumber,CASE WHEN p.ValidTo IS NULL THEN 'Invalid' ELSE p.ValidTo END AS ValidTo FROM cards c LEFT OUTER JOIN payments p on p.CardNumber = c.CardNumber WHERE UserID = ?";
        $prepare = $conn->prepare($query);
        $prepare->execute([$this->userID]);
        $temp = $prepare->fetch();
        if ($temp != null) {
            $this->userID = $temp['UserID'];
            $this->cardNumber = $temp['CardNumber'];
            $this->validity = $temp['ValidTo'];
            return true;
        } else {
            return false;
        }
    }


    public function cardBlockRequest($conn,$remarks){
        $this->getCardDetails($conn);
        if ($this->cardNumber != "") {
            $query = "INSERT INTO deactivatecards (CardNumber, IsActive, Remarks) VALUES ($this->cardNumber,1,'$remarks')";
            $result = $conn->exec($query);
            return $result;
        }
        else{
            echo("No cards found under for the logged in user.");
        }
    }

    public function updateCardsAfterBlock($conn){
        $sqlquery = "UPDATE cards SET StatusCode = 0 WHERE CardNumber = $this->cardNumber";
        $queryResult = $conn->exec($sqlquery);
    }
    
    public function deactivateCard($conn){
        $query = "UPDATE deactivatecards SET IsActive = 0 WHERE CardNumber = $this->cardNumber AND IsActive = 1";
        $result = $conn->exec($query);
        if($result){
            $this->updateCardsAfterBlock($conn);
        }
        return $result;
    }
    
    public function reloadCard($conn,$id){
        $validTo ="";
        $validFrom = date("Y-m-d");
        if($id == 1 || $id == 2 || $id == 3)
        {
            $validTo = date("Y-m-d",strtotime($validFrom. ' + 30 days'));
        }
        else if($id == 4 || $id == 5 || $id == 6)
        {
            $validTo = date("Y-m-d",strtotime($validFrom. ' + 120 days'));
        }
        else if($id = 7)
        {
            $validTo = date("Y-m-d",strtotime($validFrom. ' + 365 days'));
        }
        echo("$validFrom, $validTo");
        $query = "INSERT INTO payments (CardNumber, ValidFrom, ValidTo) VALUES ($this->cardNumber, '$validFrom', '$validTo')";
        $result = $conn->exec($query);
        return $result;

    }

}

?>