<?php

namespace Apsensa\PageBundle\Domain;

use Apsensa\PageBundle\Domain\Page\Content;
use Apsensa\PageBundle\Domain\Page\Slug;
use Apsensa\PageBundle\Domain\Page\Title;

/**
 * Class Page
 *
 * @package Apsensa\PageBundle\Domain
 */
class Page
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Title
     */
    private $title;

    /**
     * @var Slug
     */
    private $slug;

    /**
     * @var Content
     */
    private $content;

    /**
     * Page constructor.
     *
     * @param int $id
     * @param Title $title
     * @param Content $content
     * @param Slug $slug
     */
    public function __construct($id, $slug, $title, $content)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return Title
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return Slug
     */
    public function slug()
    {
        return $this->slug;
    }

    /**
     * @return Content
     */
    public function content()
    {
        return $this->content;
    }
}