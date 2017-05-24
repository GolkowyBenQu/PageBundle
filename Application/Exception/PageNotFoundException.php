<?php

namespace Apsensa\PageBundle\Application\Exception;

/**
 * Class PageNotFoundException
 *
 * @package Apsensa\PageBundle\Application\Exception
 */
class PageNotFoundException extends \Exception
{
    /**
     * Exception specific message
     *
     * @var string
     */
    protected $message = 'Page %s does not exists';

    /**
     * PageNotFoundException constructor.
     *
     * @param string $slug
     */
    public function __construct($slug = '')
    {
        parent::__construct(sprintf($this->message, $slug));
    }
}