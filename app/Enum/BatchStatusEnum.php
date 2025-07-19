<?php

namespace App\Enum;

enum BatchStatusEnum: string
{
    case PENDING = "pending";
    case SCHEDULE = "schedule";
    case  RUNNING = "running";
    case COMPLETE = "complete";
    case CANCEL = "cancel";
}

