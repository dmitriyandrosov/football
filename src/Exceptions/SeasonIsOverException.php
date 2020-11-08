<?php
declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class SeasonIsOverException
 *
 * @package App\Exceptions
 */
class SeasonIsOverException extends Exception
{
    protected const MESSAGE = 'No more teams to play with';

    /**
     * SeasonIsOverException constructor.
     *
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?: static::MESSAGE, $code, $previous);
    }
}