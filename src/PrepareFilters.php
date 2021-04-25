<?php


namespace Src;


use Src\Exceptions\TagsIsMandatoryException;
use Src\ValueObjects\DateValueObject;
use Src\ValueObjects\Tags;

/**
 * This class prepares an array of filters that arrive from the url to be launched against the api.
 * Class PrepareFilters
 * @package Src
 */
class PrepareFilters
{
    private array $filters;

    public function __construct(array $filters)
    {
        if (isset($filters['tagged'])){
            $tagsArray = explode(';', $filters['tagged']);
            $tags = new Tags($tagsArray);
            $this->filters['tagged'] = $tags->getTags();
        } else {
            throw new TagsIsMandatoryException('Tags are mandatory');
        }

        if (isset($filters['fromdate'])){
            $fromDate = new DateValueObject($filters['fromdate']);
            $this->filters['fromdate'] = $fromDate->getUnixDate();
        }

        if (isset($filters['todate'])){
            $todate = new DateValueObject($filters['todate']);
            $this->filters['todate'] = $todate->getUnixDate();
        }

    }

    public function getFilters(): array
    {
        return $this->filters;
    }
}
