<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Cron;

use Weather\WeatherBit\Service\WeatherApiService;
use Weather\WeatherBit\Model\WeatherFactory;
use Weather\WeatherBit\Model\WeatherRepository;
use Magento\Framework\Serialize\Serializer\Json;

class WeatherUpdate
{
    /**
     * @var WeatherApiService
     */
    private WeatherApiService $apiService;

    /**
     * @var WeatherFactory
     */
    private WeatherFactory $weatherFactory;

    /**
     * @var WeatherRepository
     */
    private WeatherRepository $weatherRepository;

    /**
     * @var Json
     */
    private Json $json;

    /**
     * WeatherUpdate constructor.
     * @param WeatherApiService $apiService
     * @param WeatherFactory $weatherFactory
     * @param WeatherRepository $weatherRepository
     * @param Json $json
     */
    public function __construct(
        WeatherApiService $apiService,
        WeatherFactory $weatherFactory,
        WeatherRepository $weatherRepository,
        Json $json
    ) {
        $this->apiService = $apiService;
        $this->weatherFactory = $weatherFactory;
        $this->weatherRepository = $weatherRepository;
        $this->json = $json;
    }

    public function execute(): bool
    {
        $weatherApiResponse = $this->apiService->getWeather();
        if (!$weatherApiResponse) {
            return false;
        }
        $weatherArray = $this->json->unserialize($weatherApiResponse);
        $weatherData = $weatherArray['data'][0];
        $weather = $this->weatherFactory->create();
        $weather->setCityName($weatherData['city_name'])
            ->setCountryCode($weatherData['country_code'])
            ->setStateCode($weatherData['state_code'])
            ->setLat($weatherData['lat'])
            ->setLon($weatherData['lon'])
            ->setSunrise($weatherData['sunrise'])
            ->setSunset($weatherData['sunset'])
            ->setPres($weatherData['pres'])
            ->setSlp($weatherData['slp'])
            ->setWindSpd($weatherData['wind_spd'])
            ->setWindDir($weatherData['wind_dir'])
            ->setWindCdir($weatherData['wind_cdir'])
            ->setWindCdirFull($weatherData['wind_cdir_full'])
            ->setTemp($weatherData['temp'])
            ->setAppTemp($weatherData['app_temp'])
            ->setRh($weatherData['rh'])
            ->setClouds($weatherData['clouds'])
            ->setWeatherIcon($weatherData['weather']['icon'])
            ->setWeatherDescription($weatherData['weather']['description']);
        try {
            $this->weatherRepository->save($weather);
        } catch (\Exception $e) {
            return false;
        }
    }

}
