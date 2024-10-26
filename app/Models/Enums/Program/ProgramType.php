<?php

namespace App\Models\Enums\Program;

enum ProgramType: string
{
    case BBP = 'bbp';
    case VDP = 'vdp';
    case Private = 'private';
    case Campaign = 'campaign';
}
