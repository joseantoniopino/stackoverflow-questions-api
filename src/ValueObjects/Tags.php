<?php


namespace Src\ValueObjects;



use Src\Exceptions\TagsNotValidException;

/**
 * This class is used to create a string of tags, checking that there is at least one tag.
 * Class Tags
 * @package Src\ValueObjects
 */
class Tags
{
    public function __construct(private array $tags)
    {
        $this->setTags($tags);
    }

    private function setTags(array $tags): void
    {
        if (!is_array($this->tags) || empty($this->tags)) {
            throw new TagsNotValidException("At least one tag is required. The tags must go in the url separated by ';'");
        } else {
            $this->tags = $tags;
        }

    }

    public function getTags(): string
    {
        return implode(';', $this->tags);
    }
}
