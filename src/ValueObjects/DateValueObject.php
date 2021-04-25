<?php


namespace Src\ValueObjects;


use Src\Exceptions\DateFormatNotIsValid;

/**
 * This class is used to instantiate dates.
 * It also checks that the format is correct and its return is transformed so that the external api understands it.
 * Class DateValueObject
 * @package Src\ValueObjects
 */
class DateValueObject
{
    private string $date;

    public function __construct(string $date)
    {
        if ($this->isValidDate($date)){
            $this->setDate($date);
        } else {
            throw new DateFormatNotIsValid('The correct date format is: Y-m-d, for example: 2020-12-25 (Christmas day)');
        }
    }

    public function getUnixDate(): string
    {
        return strtotime($this->date);
    }

    private function setDate(string $date): void
    {
        $this->date = $date;
    }

    private function isValidDate(string $date): bool
    {
        $isValidDate = false;
        $checkDate = date_parse_from_format('Y-m-d', $date);
        if ($checkDate['error_count'] == 0 && $checkDate['warning_count'] == 0)
            $isValidDate = true;
        return $isValidDate;
    }
}
