<?php

namespace Apsensa\PageBundle\Application\Command;

use Apsensa\PageBundle\Application\Repository\PagesRepository;
use Apsensa\PageBundle\Domain\Page;
use Apsensa\PageBundle\Domain\Page\Title;
use Apsensa\PageBundle\Domain\Page\Content;
use Apsensa\PageBundle\Domain\Page\Slug;

/**
 * Class CreateNewPageHandler
 *
 * @package Apsensa\PageBundle\Application\Command
 */
final class CreateNewPageHandler
{
    /**
     * @var PagesRepository
     */
    private $pagesRepository;

    /**
     * CreateNewPageHandler constructor.
     *
     * @param PagesRepository $pagesRepository
     */
    public function __construct($pagesRepository)
    {
        $this->pagesRepository = $pagesRepository;
    }

    /**
     * @param CreateNewPage $command
     */
    public function handle($command)
    {
        $page = new Page(
            null,
            new Slug($command->slug()),
            new Title($command->title()),
            new Content($command->content())
        );

        $this->pagesRepository->add($page);
    }
}