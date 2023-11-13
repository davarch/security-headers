<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Keywords;

enum Keyword: string
{
    case all = '*';
    case empty = '';
    case self = 'self';
    case src = 'src';
    case origin = 'origin';
}
