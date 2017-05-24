<?php

namespace Apsensa\PageBundle\Controller;

use Apsensa\PageBundle\Application\Command\CreateNewPage;
use Apsensa\PageBundle\Application\Command\CreateNewPageHandler;
use Apsensa\PageBundle\Application\Query\PageView;
use Apsensa\PageBundle\Application\Repository\PagesRepository;
use Apsensa\PageBundle\Infrastructure\Doctrine\ORM\DoctrinePageQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PageController
 *
 * @package PageBundle\Controller
 */
class PageController extends Controller
{
    /**
     * Render static page for given slug
     *
     * @param string $slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug = 'default-slug')
    {
        /** @var DoctrinePageQuery $pageQuery */
        $pageQuery = $this->get('pages_query');

        /** @var PageView $page */
        $page = $pageQuery->getBySlug($slug);

        return $this->render('ApsensaPageBundle:Page:show.html.twig', [
            'page' => $page
        ]);
    }

    /**
     * A few examples for Query
     */
    private function queryExamples()
    {
        /** @var DoctrinePageQuery $pageQuery */
        $pageQuery = $this->get('pages_query');

        /** @var int $count */
        $count = $pageQuery->count();

        $id = 1;

        /** @var DoctrinePageQuery $pageQuery */
        $pageQuery = $this->get('pages_query');

        /** @var PageView $page */
        $page = $pageQuery->getById($id);

        /** @var DoctrinePageQuery $pageQuery */
        $pageQuery = $this->get('pages_query');

        /** @var PageView $pages */
        $pages = $pageQuery->getAll();
    }

    /*
     * Some command examples
     */
    private function commandExamples()
    {
        $newPageCommand = new CreateNewPage('mySlug', 'myTitle', 'myContent');

        /** @var CreateNewPageHandler $newPageHandler */
        $newPageHandler = $this->get('new_page_handler');
        $newPageHandler->handle($newPageCommand);

        /** @var PagesRepository $pagesRepository */
        $pagesRepository = $this->get('pages_repository');
        $pagesRepository->commit();
    }
}
