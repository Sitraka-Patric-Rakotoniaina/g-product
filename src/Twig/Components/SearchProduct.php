<?php

namespace App\Twig\Components;

use App\Form\SearchProductForm;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(template: 'components/SearchProduct.html.twig')]
class SearchProduct extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(writable: true)]
    public array $categories = [];

    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function getProducts()
    {
        return $this->repository->findProductsByCategory($this->categories);
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(SearchProductForm::class);
    }
}
