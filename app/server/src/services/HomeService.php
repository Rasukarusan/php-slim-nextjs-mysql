<?php

namespace Services;

use Exception;
use Lib\Result;
use Models\Log;

class HomeService
{
    public function currentLog(): array
    {
        return [
            'scriptName' => $_SERVER['SCRIPT_NAME'],
            'requestUri' => $_SERVER['REQUEST_URI'],
            'authUser' => $_SERVER['PHP_AUTH_USER'],
            'referer' => $_SERVER['HTTP_REFERER'],
            'remoteHost' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'userAgent' => $_SERVER['HTTP_USER_AGENT'],
        ];
    }

    public function findAll()
    {
        return Log::all();
    }

    public function store(): Result
    {
        $value = $this->currentLog();

        try {
            $log = new Log();
            $log->value = json_encode($value);
            $log->save();
        } catch (Exception $e) {
            return new Result($e->getMessage(), false);
        }
        return new Result('success', true);
    }

    public function update($id, $value): Result
    {
        try {
            $log = Log::find($id);

            if ($log === null) {
                throw new Exception('Invalid id');
            }
            $log->value = $value;
            $log->save();
        } catch (Exception $e) {
            return new Result($e->getMessage(), false);
        }
        return new Result('success', true);
    }

    public function destroy($id): Result
    {
        try {
            $result = Log::destroy($id);
        } catch (Exception $e) {
            return new Result($e->getMessage(), false);
        }
        return new Result('success', true);
    }
}
