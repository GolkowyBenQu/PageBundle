<?php

namespace Apsensa\PageBundle\Infrastructure\Doctrine\ORM;

use Apsensa\PageBundle\Application\Exception\PageNotFoundException;
use Apsensa\PageBundle\Application\Query\PageQuery;
use Apsensa\PageBundle\Application\Query\PageView;
use Apsensa\PageBundle\Domain\Page;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DoctrinePageQuery
 *
 * @package Apsensa\PageBundle\Infrastructure\Doctrine\ORM
 */
final class DoctrinePageQuery implements PageQuery
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DoctrinePageQuery constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('count(p.id)')
            ->from(Page::class, 'p');

        return $queryBuilder
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @inheritdoc
     */
    public function getById($id)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from(Page::class, 'p')
            ->where('p.id = ?1')
            ->setParameter(1, $id);

        $page = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        if ($page === null) {
            throw new PageNotFoundException();
        }

        return new PageView($page['slug.slug'], $page['title.title'], $page['content.content']);
    }

    /**
     * @inheritdoc
     */
    public function getAll()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from(Page::class, 'p');

        $pages = $queryBuilder
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return array_map(function($page) {
            return new PageView($page['slug.slug'], $page['title.title'], $page['content.content']);
        }, $pages);
    }

    /**
     * Get page for given slug
     *
     * @param $slug
     *
     * @return mixed
     *
     * @throws PageNotFoundException
     */
    public function getBySlug($slug)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('p')
            ->from(Page::class, 'p')
            ->where('p.slug.slug = ?1')
            ->setParameter(1, $slug);

        $page = $queryBuilder
            ->getQuery()
            ->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        if ($page === null) {
            throw new PageNotFoundException($slug);
        }

        return new PageView($page['slug.slug'], $page['title.title'], $page['content.content']);
    }
}