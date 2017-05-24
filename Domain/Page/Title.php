<?php

namespace Apsensa\PageBundle\Domain\Page;

/**
 * Class Title
 *
 * @package Apsensa\PageBundle\Domain\Page
 */
class Title
{
    /**
     * @var string
     */
    private $title;

    /**
     * Title constructor.
     *
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}