<?php
declare(strict_types=1);

namespace Weather\WeatherBit\ViewModel;


use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Weather\WeatherBit\Model\WeatherRepository;
use Magento\Framework\Api\SortOrderBuilder;
use Weather\WeatherBit\Api\Data\WeatherInterface;

class Weather implements ArgumentInterface
{
    const WEATHER_ICON_BASE_URI = 'https://www.weatherbit.io/static/img/icons/';

    /**
     * @var WeatherRepository
     */
    private WeatherRepository $weatherRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var SortOrderBuilder
     */
    private SortOrderBuilder $sortOrderBuilder;

    /**
     * @param WeatherRepository $weatherRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param SortOrderBuilder $sortOrderBuilder
     */
    public function __construct(
        WeatherRepository $weatherRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder
    ) {
        $this->weatherRepository = $weatherRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function getWeather(): ?WeatherInterface
    {
        $sortOrder = $this->sortOrderBuilder
            ->setField(WeatherInterface::CREATED_AT)
            ->setDescendingDirection()
            ->create();
        $searchCriteria = $this->searchCriteriaBuilder
            ->setSortOrders([$sortOrder])
            ->setPageSize(1)
            ->create();
        $weatherItems = $this->weatherRepository->getList($searchCriteria)->getItems();
        /** @var WeatherInterface $weather */
        $weather = array_shift($weatherItems);

        return $weather;
    }

    public function getIconSrc(string $weatherIcon): string
    {
        return self::WEATHER_ICON_BASE_URI . $weatherIcon . '.png';
    }
}
