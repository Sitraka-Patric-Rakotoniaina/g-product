<?php

namespace App\Model;

use App\Entity\Category;
use Doctrine\Common\Collections\Collection;

class SearchProduct
{
    public array $categories = [];

    public int $page = 1;
}