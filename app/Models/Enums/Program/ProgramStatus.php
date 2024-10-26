<?php

namespace App\Models\Enums\Program;

enum ProgramStatus: string
{
    case Active = 'active';
    case Deactive = 'deactive';
    case Review = 'review';
}
