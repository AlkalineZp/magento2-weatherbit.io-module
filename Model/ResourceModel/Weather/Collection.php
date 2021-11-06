<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Weather\WeatherBit\Api\Data\WeatherInterface;
use Weather\WeatherBit\Model\Weather as WeatherModel;
use Weather\WeatherBit\Model\ResourceModel\Weather as WeatherResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = WeatherInterface::ENTITY_ID;

    protected function _construct(): void
    {
        $this->_init(
            WeatherModel::class,
            WeatherResourceModel::class
        );
    }
}
