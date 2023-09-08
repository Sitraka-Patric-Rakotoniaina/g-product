<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Bezhanov\Faker\Provider\Commerce;
use Bezhanov\Faker\Provider\Science;
use Bezhanov\Faker\Provider\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('FR');
        $faker->addProvider(new Commerce($faker));
        $faker->addProvider(new Team($faker));
        for ($j = 0; $j < 5; $j++) {
            $category = new Category();
            $category->setName($faker->team);
            $manager->persist($category);

            for ($i = 0; $i < 3; $i++) {
                $product = new Product();
                $product->setName($faker->productName)
                    ->setPrice($faker->randomFloat(2, 50, 5000))
                    ->setQuantity($faker->randomDigit())
                    ->setCategory($category);
                $manager->persist($product);
            }
        }
        $manager->flush();
    }
}
