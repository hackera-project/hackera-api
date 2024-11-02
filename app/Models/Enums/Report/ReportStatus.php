<?php

namespace App\Models\Enums\Report;

enum ReportStatus: string
{
    case Pending = 'pending';
    case Duplicated = 'duplicated';
    case Rejected = 'rejected';
    case Approved = 'approved';
}
