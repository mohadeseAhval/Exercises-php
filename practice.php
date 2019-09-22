<?php

trait FirstWorld
{
    protected $FreedomSpeechPress;
    protected $FreedomCoverage;
    protected $FinancialTransparency;
    protected $ActiveGlobalEconomy;
}

trait ThirdWorld
{
    protected $Traditionalism;
    protected $Religion;
    protected $AncientHistory;
    protected $HighPopulation;
    protected $LowQualityLife;
}

//Continent
interface ContinentInterface
{}
class BaseContinent implements ContinentInterface
{
    private $contry = [];
    public function addCountry(CountryInterface $Contry)
    {
        $this->contry[] = $Contry;
    }
}
class Asia extends BaseContinent
{}
class EastَAsia extends Asia
{
    use FirstWorld;
}
class WestAsia extends Asia
{
    use ThirdWorld;
}
class MiddleEastAsia extends Asia
{
    use ThirdWorld;
}
class Europe extends BaseContinent
{
    use FirstWorld;
}
class Africa extends BaseContinent
{
    use ThirdWorld;
}
class Australia extends BaseContinent
{
    use ThirdWorld;
}
class NorthAmerica extends BaseContinent
{
    use FirstWorld;
}
class SouthAmerica extends BaseContinent
{
    use ThirdWorld;
}

//Country
interface CountryInterface
{
    public function population();
    public function area();
    public function getCountryName();
}
class Country implements CountryInterface
{
    private $States = [];
    private $name;
    public function population()
    {
        return "Country population";
    }
    public function area()
    {
        return "Country population";
    }
    public function addState(StateInterface $state)
    {
        $this->States[] = $State;
    }
    public function setCountryName($name)
    {
        $this->name = $name;
    }
    public function getCountryName()
    {
        return $this->name;
    }

}
//State
interface StateInterface
{}
class State implements StateInterface
{
    private $Cities = [];
    public function addCity(CityInterface $city)
    {
        $this->Cities[] = $city;
    }
}
//City
interface CityInterface
{}
class City implements CityInterface
{
    private $Name;
    public function setCityName($name)
    {
        $this->Name = $name;
    }
}
class UnitedNations
{
    private $CountryUN = [];
    public function addCountryToMeetingHall(CountryInterface $country)
    {
        if ($country->getCountryName() == "Iran") {
            return;
        }
        $this->CountryUN[] = $country;
    }
    public function printNameOfAudiences()
    {
        foreach ($this->CountryUN as $item) {
            echo $item->getCountryName() . "\n";
        }

    }
}
function execute()
{
    $iran = new Country();
    $iran->setCountryName("Iran");

    $egypt = new Country();
    $egypt->setCountryName("Egypt");

    $germany = new Country();
    $germany->setCountryName("Germany");

    $uN = new UnitedNations();
    $uN->addCountryToMeetingHall($iran);
    $uN->addCountryToMeetingHall($egypt);
    $uN->addCountryToMeetingHall($germany);

    $uN->printNameOfAudiences();

}
execute();
