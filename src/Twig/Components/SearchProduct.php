<?php

namespace App\Twig\Components;

use App\Repository\ProductRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
final class SearchProduct
{
    use DefaultActionTrait;

    #[LiveProp]
    public ?int $category = null;

    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function getProducts()
    {
        return $this->repository->findProductsByCategory($this->category);
    }
}
