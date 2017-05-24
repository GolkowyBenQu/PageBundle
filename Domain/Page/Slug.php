<?php

namespace Apsensa\PageBundle\Domain\Page;

/**
 * Class Slug
 *
 * @package Apsensa\PageBundle\Domain\Page
 */
class Slug
{
    /**
     * @var string
     */
    private $slug;

    /**
     * Slug constructor.
     *
     * @param $slug
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->slug;
    }
}