<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker= Faker::create('en_US');

        $actors = [];
        for ($i=0; $i < 20; $i++) { 
            $actor = new Actor();
            $actor->setName($faker->name);
            $manager->persist($actor);
            $actors[] = $actor;
        }

        $movies = [];
        for ($i=0; $i < 20; $i++) { 
            $movie = new Movie();
            $movie->setTitle($faker->sentence(5))
            ->setDescription($faker->text)
            ->setReleaseYear($faker->year)
            ->setImagePath($faker->imageUrl(200, 300))
            ->addActor($faker->randomElement($actors));
            $manager->persist($movie);
            $movies[] = $movie;
        }

        $manager->flush();
    }
}
