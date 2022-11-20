<?php

namespace App\Queries;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface QueryBuilder
{
    public function getBilder():Builder;
}
