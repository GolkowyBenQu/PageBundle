<?php
/**
 * Created by PhpStorm.
 * User: przemek
 * Date: 31.07.16
 * Time: 11:17
 */

namespace PageBundle\Controller;

use PageBundle\Entity\Page;
use PageBundle\Entity\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PageController
 * @package PageBundle\Controller
 */
class PageController extends Controller
{
    /**
     * Render static page for given slug
     *
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($slug = 'default-slug')
    {
        $em = $this->getDoctrine()->getManager();

        /** @var PageRepository $pageRepository */
        $pageRepository = $em->getRepository('PageBundle:StaticPage');

        /** @var Page $page */
        $page = $pageRepository->getPageBySlug($slug);

        if (!$page) {
            $page = new Page();
            $page->setSlug($slug);
            $page->setContent($slug);
            $page->setTitle($slug);
            $page->setEnabled(false);
            $em->persist($page);
            $em->flush();

            throw $this->createNotFoundException('This page does not exist');
        }

        if (!$page->getEnabled()) {
            throw $this->createNotFoundException('This page does not exist');
        }

        return $this->render('PageBundle:Page:show.html.twig', [
            'page' => $page
        ]);
    }
}
