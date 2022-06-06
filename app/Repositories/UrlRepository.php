<?php

namespace App\Repositories;

use App\Interfaces\UrlRepositoryInterface;
use App\Models\Url;
use Carbon\Carbon;


class UrlRepository implements UrlRepositoryInterface
{
    public function getUrlByCode($code)
    {
        return Url::where('code', $code)->first();
    }

    public function createUrl(array $urlDetails)
    {
        return Url::create($urlDetails);
    }

    public function updateLastVisited($code)
    {
        return Url::where('code', $code)
            ->update([
                'last_visited'     => Carbon::now()
            ]);
    }
}
