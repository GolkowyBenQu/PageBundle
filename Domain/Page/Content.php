<?php

namespace Apsensa\PageBundle\Domain\Page;

/**
 * Class Content
 *
 * @package Apsensa\PageBundle\Domain\Page
 */
class Content
{
    /**
     * @var string
     */
    private $content;

    /**
     * Content constructor.
     *
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }
}