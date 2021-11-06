<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Model;

use Magento\Framework\Model\AbstractModel;
use Weather\WeatherBit\Api\Data\WeatherInterface;

class Weather extends AbstractModel implements WeatherInterface
{
    /**
     * @return void
     */
    public function _construct(): void
    {
        $this->_init(ResourceModel\Weather::class);
    }

    /**
     * City name
     * @inheritDoc
     */
    public function getCityName(): string
    {
        return (string)$this->getData(WeatherInterface::CITY_NAME);
    }

    /**
     * Country abbreviation
     * @inheritDoc
     */
    public function getCountryCode(): string
    {
        return (string)$this->getData(WeatherInterface::COUNTRY_CODE);
    }

    /**
     * State abbreviation/code
     * @inheritDoc
     */
    public function getStateCode(): string
    {
        return (string)$this->getData(WeatherInterface::STATE_CODE);
    }

    /**
     * Latitude (Degrees)
     * @inheritDoc
     */
    public function getLat(): float
    {
        return (float)$this->getData(WeatherInterface::LAT);
    }

    /**
     * Longitude (Degrees)
     * @inheritDoc
     */
    public function getLon(): float
    {
        return (float)$this->getData(WeatherInterface::LON);
    }

    /**
     * Sunrise time (HH:MM)
     * @inheritDoc
     */
    public function getSunrise(): string
    {
        return (string)$this->getData(WeatherInterface::SUNRISE);
    }

    /**
     * Sunset time (HH:MM)
     * @inheritDoc
     */
    public function getSunset(): string
    {
        return (string)$this->getData(WeatherInterface::SUNSET);
    }

    /**
     * Pressure (mb)
     * @inheritDoc
     */
    public function getPres(): float
    {
        return (float)$this->getData(WeatherInterface::PRES);
    }

    /**
     * Sea level pressure (mb)
     * @inheritDoc
     */
    public function getSlp(): float
    {
        return (float)$this->getData(WeatherInterface::SLP);
    }

    /**
     * Wind speed (Default m/s)
     * @inheritDoc
     */
    public function getWindSpd(): float
    {
        return (float)$this->getData(WeatherInterface::WIND_SPD);
    }

    /**
     * Wind direction (degrees)
     * @inheritDoc
     */
    public function getWindDir(): int
    {
        return (int)$this->getData(WeatherInterface::WIND_DIR);
    }

    /**
     * Abbreviated wind direction
     * @inheritDoc
     */
    public function getWindCdir(): string
    {
        return (string)$this->getData(WeatherInterface::WIND_CDIR);
    }

    /**
     * Verbal wind direction
     * @inheritDoc
     */
    public function getWindCdirFull(): string
    {
        return (string)$this->getData(WeatherInterface::WIND_CDIR_FULL);
    }

    /**
     * Temperature (Celcius)
     * @inheritDoc
     */
    public function getTemp(): int
    {
        return (int)$this->getData(WeatherInterface::TEMP);
    }

    /**
     * Apparent/Feels Like temperature (Celcius)
     * @inheritDoc
     */
    public function getAppTemp(): int
    {
        return (int)$this->getData(WeatherInterface::APP_TEMP);
    }

    /**
     * Relative humidity (%)
     * @inheritDoc
     */
    public function getRh(): int
    {
        return (int)$this->getData(WeatherInterface::RH);
    }

    /**
     * Cloud coverage (%)
     * @inheritDoc
     */
    public function getClouds(): int
    {
        return (int)$this->getData(WeatherInterface::CLOUDS);
    }

    /**
     * Weather icon code
     * @inheritDoc
     */
    public function getWeatherIcon(): string
    {
        return (string)$this->getData(WeatherInterface::WEATHER_ICON);
    }

    /**
     * Text weather description
     * @inheritDoc
     */
    public function getWeatherDescription(): string
    {
        return (string)$this->getData(WeatherInterface::WEATHER_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): string
    {
        return (string)$this->getData(WeatherInterface::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCityName(string $cityName): WeatherInterface
    {
        return $this->setData(WeatherInterface::CITY_NAME, $cityName);
    }

    /**
     * @inheritDoc
     */
    public function setCountryCode(string $countryCode): WeatherInterface
    {
        return $this->setData(WeatherInterface::COUNTRY_CODE, $countryCode);
    }

    /**
     * @inheritDoc
     */
    public function setStateCode(string $stateCode): WeatherInterface
    {
        return $this->setData(WeatherInterface::STATE_CODE, $stateCode);
    }

    /**
     * @inheritDoc
     */
    public function setLat(float $lat): WeatherInterface
    {
        return $this->setData(WeatherInterface::LAT, $lat);
    }

    /**
     * @inheritDoc
     */
    public function setLon(float $lon): WeatherInterface
    {
        return $this->setData(WeatherInterface::LON, $lon);
    }

    /**
     * @inheritDoc
     */
    public function setSunrise(string $sunrise): WeatherInterface
    {
        return $this->setData(WeatherInterface::SUNRISE, $sunrise);
    }

    /**
     * @inheritDoc
     */
    public function setSunset(string $sunset): WeatherInterface
    {
        return $this->setData(WeatherInterface::SUNSET, $sunset);
    }

    /**
     * @inheritDoc
     */
    public function setPres(float $pres): WeatherInterface
    {
        return $this->setData(WeatherInterface::PRES, $pres);
    }

    /**
     * @inheritDoc
     */
    public function setSlp(float $slp): WeatherInterface
    {
        return $this->setData(WeatherInterface::SLP, $slp);
    }

    /**
     * @inheritDoc
     */
    public function setWindSpd(float $windSpd): WeatherInterface
    {
        return $this->setData(WeatherInterface::WIND_SPD, $windSpd);
    }

    /**
     * @inheritDoc
     */
    public function setWindDir(int $windDir): WeatherInterface
    {
        return $this->setData(WeatherInterface::WIND_DIR, $windDir);
    }

    /**
     * @inheritDoc
     */
    public function setWindCdir(string $windCdir): WeatherInterface
    {
        return $this->setData(WeatherInterface::WIND_CDIR, $windCdir);
    }

    /**
     * @inheritDoc
     */
    public function setWindCdirFull(string $windCdirFull): WeatherInterface
    {
        return $this->setData(WeatherInterface::WIND_CDIR_FULL, $windCdirFull);
    }

    /**
     * @inheritDoc
     */
    public function setTemp(int $temp): WeatherInterface
    {
        return $this->setData(WeatherInterface::TEMP, $temp);
    }

    /**
     * @inheritDoc
     */
    public function setAppTemp(int $appTemp): WeatherInterface
    {
        return $this->setData(WeatherInterface::APP_TEMP, $appTemp);
    }

    /**
     * @inheritDoc
     */
    public function setRh(int $rh): WeatherInterface
    {
        return $this->setData(WeatherInterface::RH, $rh);
    }

    /**
     * @inheritDoc
     */
    public function setClouds(int $clouds): WeatherInterface
    {
        return $this->setData(WeatherInterface::CLOUDS, $clouds);
    }

    /**
     * @inheritDoc
     */
    public function setWeatherIcon(string $weatherIcon): WeatherInterface
    {
        return $this->setData(WeatherInterface::WEATHER_ICON, $weatherIcon);
    }

    /**
     * @inheritDoc
     */
    public function setWeatherDescription(string $weatherDescription): WeatherInterface
    {
        return $this->setData(WeatherInterface::WEATHER_DESCRIPTION, $weatherDescription);
    }
}
