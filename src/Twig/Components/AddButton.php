<?php

namespace App\Twig\Components;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\PreMount;

#[AsTwigComponent(template: 'components/AddButton.html.twig')]
final class AddButton
{
    public string $routeName;
    public string $label;

    #[PreMount]
    public function preMount(array $data): array
    {
        $resolver = new OptionsResolver();
        $resolver->setRequired('routeName');
        $resolver->setAllowedTypes('routeName', 'string');
        $resolver->setRequired('label');
        $resolver->setAllowedTypes('label', 'string');

        return $resolver->resolve($data);
    }
}
