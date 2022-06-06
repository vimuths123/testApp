<?php

namespace App\Interfaces;

interface UrlRepositoryInterface 
{
    public function getUrlByCode($code);
    public function createUrl(array $urlDetails);
    public function updateLastVisited($code);
}