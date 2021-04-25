<?php


namespace Src;

/**
 * This class is used to add the filters that do not come from the 'url'.
 * Class AddQuestionsFilters
 * @package Src
 */
class AddQuestionsFilters
{

    public function __construct(private array $filters)
    {
        $this->filters = array_merge($filters, $this->addOrder());
        $this->filters = array_merge($filters, $this->addSort());
        $this->filters = array_merge($filters, $this->addSite());
    }

    private function addOrder(): array
    {
        $this->filters['order'] = 'desc';
        return $this->filters;
    }

    private function addSort(): array
    {
        $this->filters['sort'] = 'activity';
        return $this->filters;
    }

    private function addSite(): array
    {
        $this->filters['site'] = 'stackoverflow';
        return $this->filters;
    }

    public function getQuestionsFilters(): array
    {
        return $this->filters;
    }
}
