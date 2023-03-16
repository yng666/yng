<?php
namespace Yng\Exception;

use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;
use Throwable;

/**
 * 类找不到异常
 */
class ClassNotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
    protected $class;

    public function __construct(string $message, string $class = '', Throwable $previous = null)
    {
        $this->message = $message;
        $this->class   = $class;

        parent::__construct($message, 0, $previous);
    }

    /**
     * 获取类名
     * @access public
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
}
