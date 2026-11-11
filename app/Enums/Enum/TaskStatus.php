<?php

namespace App\Enums\Enum;

enum TaskStatus: string
{
    case Open = 'open';
    case InProgress = 'in progress';
    case Blocked = 'blocked';
    case Done = 'done';
    case Cancelled = 'cancelled';
}
