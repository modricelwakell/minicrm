<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Open       = 'open';
    case InProgress = 'in progress';
    case Blocked    = 'blocked';
    case Done       = 'done';
    case Cancelled  = 'cancelled';
}