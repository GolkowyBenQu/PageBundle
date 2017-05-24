<?php

namespace Apsensa\PageBundle\Application\Repository;
use Apsensa\PageBundle\Domain\Page;

/**
 * Interface PagesRepository
 *
 * @package Apsensa\PageBundle\Application\Repository
 */
interface PagesRepository
{
    /**
     * Add page to pages repository
     *
     * @param Page $page
     */
    public function add($page);

    /**
     * Remove page from pages repository
     *
     * @param Page $page
     */
    public function remove($page);

    /**
     * Commit all changes to database
     */
    public function commit();

    /**
     * Rollback all changes
     */
    public function rollback();
}