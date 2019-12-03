<?php

class Trips{

    private $tripTypeID;
    private $tripType;
    private $fare;



    /**
     * Get the value of tripTypeID
     */ 
    public function getTripTypeID()
    {
        return $this->tripTypeID;
    }

    /**
     * Set the value of tripTypeID
     *
     * @return  self
     */ 
    public function setTripTypeID($tripTypeID)
    {
        $this->tripTypeID = $tripTypeID;

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
     * Get the value of fare
     */ 
    public function getFare()
    {
        return $this->fare;
    }

    /**
     * Set the value of fare
     *
     * @return  self
     */ 
    public function setFare($fare)
    {
        $this->fare = $fare;

        return $this;
    }

    function __construct($tripTypeID = null, $tripType = null, $fare = null){
        $this->tripTypeID = $tripTypeID;
        $this->tripType = $tripType;
        $this->fare = $fare;
    }
}




?>