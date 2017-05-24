<?php

namespace Apsensa\PageBundle\Infrastructure\Doctrine\ORM;

use Apsensa\PageBundle\Application\Repository\PagesRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DoctrinePageRepository
 *
 * @package Apsensa\PageBundle\Infrastructure\Doctrine\ORM
 */
final class DoctrinePageRepository implements PagesRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * DoctrinePageRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityManager->beginTransaction();
    }

    /**
     * @inheritdoc
     */
    public function add($page)
    {
        if (!$this->entityManager->contains($page)) {
            $this->entityManager->persist($page);
        }
    }

    /**
     * @inheritdoc
     */
    public function remove($page)
    {
        $this->entityManager->remove($page);
    }

    /**
     * @inheritdoc
     */
    public function commit()
    {
        $this->entityManager->flush();
        $this->entityManager->getConnection()->commit();
    }

    /**
     * @inheritdoc
     */
    public function rollback()
    {
        $this->entityManager->rollback();
    }
}