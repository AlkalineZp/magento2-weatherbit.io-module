<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Weather\WeatherBit\Api\Data\WeatherInterface;

class Weather extends AbstractDb
{
    protected $_idFieldName = WeatherInterface::ENTITY_ID;

    protected function _construct(): void
    {
        $this->_init(
            WeatherInterface::TABLE_NAME,
            WeatherInterface::ENTITY_ID
        );
    }

}
