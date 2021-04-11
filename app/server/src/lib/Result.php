<?php

namespace Lib;

/**
 * Class Result.
 */
class Result
{
    private $message;

    private $result;

    public function __construct($message, $result)
    {
        $this->message = $message;
        $this->result = $result;
    }

    public function json()
    {
        return json_encode([
            'message' => $this->message,
            'result' => $this->result,
        ]);
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getResult()
    {
        return $this->result;
    }
}
