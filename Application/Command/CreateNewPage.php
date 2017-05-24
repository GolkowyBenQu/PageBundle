<?php

namespace Apsensa\PageBundle\Application\Command;

/**
 * Class CreateNewPage
 *
 * @package Apsensa\PageBundle\Application\Command
 */
final class CreateNewPage
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $slug;

    /**
     * CreateNewPage constructor.
     *
     * @param $slug
     * @param $title
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
    public function slug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }
}