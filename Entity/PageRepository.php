<?php

namespace PageBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class PageRepository
 * @package PageBundle\Entity
 */
class PageRepository extends EntityRepository
{
    /**
     * Get static page or null for concrete slug
     *
     * @param string $slug
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPageBySlug($slug = 'default-slug')
    {
        $result = $this->createQueryBuilder('page')
            ->where('page.slug = :slug')
            ->setParameter('slug', $slug)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        return $result;
    }
}

