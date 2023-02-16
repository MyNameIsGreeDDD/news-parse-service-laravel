<?php

namespace App\Repository;

use App\Models\LogRequest;

class LogRepository
{
    public function log(array $info)
    {
        return LogRequest::create($info);
    }
}
