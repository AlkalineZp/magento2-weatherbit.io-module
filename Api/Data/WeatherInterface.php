<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Api\Data;

interface WeatherInterface
{
    const TABLE_NAME = 'weather';
    const ENTITY_ID = 'entity_id';

    const CITY_NAME = 'city_name';
    const COUNTRY_CODE = 'country_code';
    const STATE_CODE = 'state_code';
    const LAT = 'lat';
    const LON = 'lon';
    const SUNRISE = 'sunrise';
    const SUNSET = 'sunset';
    const PRES = 'pres';
    const SLP = 'slp';
    const WIND_SPD = 'wind_spd';
    const WIND_DIR = 'wind_dir';
    const WIND_CDIR = 'wind_cdir';
    const WIND_CDIR_FULL = 'wind_cdir_full';
    const TEMP = 'temp';
    const APP_TEMP = 'app_temp';
    const RH = 'rh';
    const CLOUDS = 'clouds';
    const WEATHER_ICON = 'weather_icon';
    const WEATHER_DESCRIPTION = 'weather_description';
    const CREATED_AT = 'created_at';

    /**
     * @return string
     */
    public function getCityName(): string;

    /**
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * @return string
     */
    public function getStateCode(): string;

    /**
     * @return float
     */
    public function getLat(): float;

    /**
     * @return float
     */
    public function getLon(): float;

    /**
     * @return string
     */
    public function getSunrise(): string;

    /**
     * @return string
     */
    public function getSunset(): string;

    /**
     * @return float
     */
    public function getPres(): float;

    /**
     * @return float
     */
    public function getSlp(): float;

    /**
     * @return float
     */
    public function getWindSpd(): float;

    /**
     * @return int
     */
    public function getWindDir(): int;

    /**
     * @return string
     */
    public function getWindCdir(): string;

    /**
     * @return string
     */
    public function getWindCdirFull(): string;

    /**
     * @return int
     */
    public function getTemp(): int;

    /**
     * @return int
     */
    public function getAppTemp(): int;

    /**
     * @return int
     */
    public function getRh(): int;

    /**
     * @return int
     */
    public function getClouds(): int;

    /**
     * @return string
     */
    public function getWeatherIcon(): string;

    /**
     * @return string
     */
    public function getWeatherDescription(): string;

    /**
     * @return string
     */
    public function getCreatedAt(): string;


    /**
     * @param string $cityName
     * @return WeatherInterface
     */
    public function setCityName(string $cityName): WeatherInterface;

    /**
     * @param string $countryCode
     * @return WeatherInterface
     */
    public function setCountryCode(string $countryCode): WeatherInterface;

    /**
     * @param string $stateCode
     * @return WeatherInterface
     */
    public function setStateCode(string $stateCode): WeatherInterface;

    /**
     * @param float $lat
     * @return WeatherInterface
     */
    public function setLat(float $lat): WeatherInterface;

    /**
     * @param float $lon
     * @return WeatherInterface
     */
    public function setLon(float $lon): WeatherInterface;

    /**
     * @param string $sunrise
     * @return WeatherInterface
     */
    public function setSunrise(string $sunrise): WeatherInterface;

    /**
     * @param string $sunset
     * @return WeatherInterface
     */
    public function setSunset(string $sunset): WeatherInterface;

    /**
     * @param float $pres
     * @return WeatherInterface
     */
    public function setPres(float $pres): WeatherInterface;

    /**
     * @param float $slp
     * @return WeatherInterface
     */
    public function setSlp(float $slp): WeatherInterface;

    /**
     * @param float $windSpd
     * @return WeatherInterface
     */
    public function setWindSpd(float $windSpd): WeatherInterface;

    /**
     * @param int $windDir
     * @return WeatherInterface
     */
    public function setWindDir(int $windDir): WeatherInterface;

    /**
     * @param string $windCdir
     * @return WeatherInterface
     */
    public function setWindCdir(string $windCdir): WeatherInterface;

    /**
     * @param string $windCdirFull
     * @return WeatherInterface
     */
    public function setWindCdirFull(string $windCdirFull): WeatherInterface;

    /**
     * @param int $temp
     * @return WeatherInterface
     */
    public function setTemp(int $temp): WeatherInterface;

    /**
     * @param int $appTemp
     * @return WeatherInterface
     */
    public function setAppTemp(int $appTemp): WeatherInterface;

    /**
     * @param int $rh
     * @return WeatherInterface
     */
    public function setRh(int $rh): WeatherInterface;

    /**
     * @param int $clouds
     * @return WeatherInterface
     */
    public function setClouds(int $clouds): WeatherInterface;

    /**
     * @param string $weatherIcon
     * @return WeatherInterface
     */
    public function setWeatherIcon(string $weatherIcon): WeatherInterface;

    /**
     * @param string $weatherDescription
     * @return WeatherInterface
     */
    public function setWeatherDescription(string $weatherDescription): WeatherInterface;
}
