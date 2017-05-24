<?php

namespace Apsensa\PageBundle\Application\Query;

/**
 * Class PageView
 *
 * @package Apsensa\PageBundle\Application\Query
 */
final class PageView
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * PageView constructor.
     *
     * @param string $slug
     * @param string $title
     * @param $content
     */
    public function __construct($slug, $title, $content)
    {
        $this->slug = $slug;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function slug() {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function title() {
        return $this->title;
    }

    /**
     * @return string
     */
    public function content() {
        return $this->content;
    }
}