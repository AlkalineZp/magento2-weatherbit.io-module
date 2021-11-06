<?php
declare(strict_types=1);

namespace Weather\WeatherBit\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Weather\WeatherBit\Api\Data\WeatherInterface;
use Weather\WeatherBit\Api\WeatherRepositoryInterface;
use Weather\WeatherBit\Model\WeatherFactory;
use Weather\WeatherBit\Model\ResourceModel\Weather as WeatherResourceModel;
use Weather\WeatherBit\Model\ResourceModel\Weather\Collection;
use Weather\WeatherBit\Model\ResourceModel\Weather\CollectionFactory;

class WeatherRepository implements WeatherRepositoryInterface
{
    /**
     * @var WeatherResourceModel
     */
    private WeatherResourceModel $resourceModel;

    /**
     * @var \Weather\WeatherBit\Model\WeatherFactory
     */
    private WeatherFactory $weatherFactory;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private SearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * WeatherRepository constructor.
     * @param WeatherResourceModel $resourceModel
     * @param WeatherFactory $weatherFactory
     * @param CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        WeatherResourceModel $resourceModel,
        WeatherFactory $weatherFactory,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->weatherFactory = $weatherFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @inheritDoc
     */
    public function save(WeatherInterface $entity): WeatherInterface
    {
        try {
            $this->resourceModel->save($entity);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('The entity was unable to be saved. Please try again.'),
                $e
            );
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function get(int $entityId): WeatherInterface
    {
        $weather = $this->weatherFactory->create();
        $this->resourceModel->load($weather, $entityId);
        if (!$weather->getId()) {
            throw new NoSuchEntityException(
                __("The entity that was requested doesn't exist. Verify and try again.")
            );
        }
        return $weather;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $collection->load();

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    /**
     * @inheritDoc
     */
    public function delete(WeatherInterface $weather): bool
    {
        try {
            $this->resourceModel->delete($weather);
        } catch (\Exception $e) {
            throw new StateException(
                __('The entity couldn\'t be removed.'),
                $e
            );
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $entityId): bool
    {
        $weather = $this->get($entityId);
        return $this->delete($weather);
    }
}
