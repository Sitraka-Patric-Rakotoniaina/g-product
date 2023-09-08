<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName($faker->word())
                ->setPrice($faker->randomFloat(2, 5, 100))
                ->setQuantity($faker->randomDigit());
            $manager->persist($product);
        }
        $manager->flush();
    }
}
