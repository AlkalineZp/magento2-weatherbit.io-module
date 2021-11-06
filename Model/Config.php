<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_API_KEY = 'weather_weatherbit/api_config/api_key';
    const XML_PATH_CITY = 'weather_weatherbit/api_config/city';
    const XML_PATH_COUNTRY_CODE = 'weather_weatherbit/api_config/country_code';

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getApiKey($store = null): string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_KEY,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    public function getCity($store = null): string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CITY,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    public function getCountryCode($store = null): string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_COUNTRY_CODE,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }
}
