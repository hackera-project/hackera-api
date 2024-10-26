<?php

namespace App\Models\Enums\Asset;

enum AssetType: string
{
    case GooglePlayId = 'google-play-id';
    case AppStoreId = 'app-store-id';
    case Wildcard = 'wildcard';
    case Url = 'url';
    case SourceCode = 'source-code';
}
