<?php

class User{
    
    private $userID;
    private $password;
    private $userType;
    private $phone;
    private $name;
    private $streetAddress;
    private $city;
    private $zipCode;
    private $profile;
    
    
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
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of userType
     */ 
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set the value of userType
     *
     * @return  self
     */ 
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    
    
    /**
     * Get the value of streetAddress
     */ 
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set the value of streetAddress
     *
     * @return  self
     */ 
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of zipCode
     */ 
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */ 
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

     /**
     * Get the value of profile
     */ 
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set the value of profile
     *
     * @return  self
     */ 
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    function __construct($userID = null, $password = null, $name=null, $phone=null, $userType=null, $streetAddress = null,$city=null, $zipcode = null, $profile = null){
        
        $this->userID = $userID;
        $this->password = $password;
        $this->name = $name;
        $this->phone = $phone;
        $this->userType = $userType;
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->zipCode = $zipcode;
        $this->profile = $profile;
    }
    
    public function login($conn){
        $query = "SELECT * FROM Users WHERE UserID = ? AND Password = ?";
        $prepare = $conn->prepare($query);
        $prepare->execute([$this->userID,$this->password]);
        $temp = $prepare->fetch();
        if ($temp != null) {
            $this->userID = $temp['UserID'];
            $this->password = $temp['Password'];
            $this->name = $temp['Name'];
            $this->phone = $temp['PhoneNumber'];
            $this->userType = $temp['UserTypeID'];
            $this->streetAddress = $temp['StreetAddress'];
            $this->city = $temp['City'];
            $this->zipCode = $temp['ZipCode'];
            $this->profile = $temp['profilepic'];
            return true;
        } else {
            return false;
        }
    }

    public function createUser($conn,$id){
        $query = "INSERT INTO Users (Password,Name,PhoneNumber,UserTypeID,profilepic) VALUES ('$this->password', '$this->name','$this->phone',$this->userType, '$this->profile')";
        $result = $conn->exec($query);
        return $result;

    }

    public function updateUserDetails($conn){
        $query = "UPDATE Users SET Name = '$this->name', PhoneNumber = '$this->phone', StreetAddress = '$this->streetAddress', City = '$this->city', ZipCode = '$this->zipCode' WHERE UserID = $this->userID";
        $result = $conn->exec($query);
        return $result;
    }

    public function updatePassword($conn){
        $query = "UPDATE Users SET Password = '$this->password' WHERE UserID = $this->userID";
        $result = $conn->exec($query);
        return $result;
    }


    public function updateFare($conn,$fare,$tripType){

        $query = "UPDATE triptypes SET Fare = $fare WHERE TripTypeID = $tripType";
        $result = $conn->exec($query);
        return $result;
    }
}

?>