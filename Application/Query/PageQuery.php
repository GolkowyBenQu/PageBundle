<?php

namespace Apsensa\PageBundle\Application\Query;
use Apsensa\PageBundle\Application\Exception\PageNotFoundException;

/**
 * Interface PageQuery
 *
 * @package Apsensa\PageBundle\Application\Query
 */
interface PageQuery
{
    /**
     *
     * Get all pages count
     *
     * @return int
     */
    public function count();

    /**
     * Get specific page by id
     *
     * @param $id
     *
     * @return PageView
     *
     * @throws PageNotFoundException
     */
    public function getById($id);

    /**
     * Get all pages
     *
     * @return PageView[]
     */
    public function getAll();
}