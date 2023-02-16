<?php

namespace App\Services;

use App\Repository\LogRepository;

class LogService
{
    private LogRepository $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function log(array $info)
    {
        return $this->logRepository->log($info);
    }
}
