<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($j = 0; $j < 5; $j++) {
            $category = new Category();
            $category->setName($faker->word());
            $manager->persist($category);

            for ($i = 0; $i < 3; $i++) {
                $product = new Product();
                $product->setName($faker->word())
                    ->setPrice($faker->randomFloat(2, 5, 100))
                    ->setQuantity($faker->randomDigit())
                    ->setCategory($category);
                $manager->persist($product);
            }
        }
        $manager->flush();
    }
}
