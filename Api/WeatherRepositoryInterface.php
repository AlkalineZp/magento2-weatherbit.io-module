<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Api;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Weather\WeatherBit\Api\Data\WeatherInterface;

interface WeatherRepositoryInterface
{
    /**
     * @param WeatherInterface $entity
     * @return WeatherInterface
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function save(WeatherInterface $entity): WeatherInterface;

    /**
     * @param int $entityId
     * @return WeatherInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): WeatherInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface;

    /**
     * @param WeatherInterface $weather
     * @return bool
     * @throws StateException
     */
    public function delete(WeatherInterface $weather): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws StateException
     */
    public function deleteById(int $entityId): bool;

}
