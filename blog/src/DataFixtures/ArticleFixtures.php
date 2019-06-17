<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 17/06/19
 * Time: 09:47
 */

namespace App\DataFixtures;

use Faker;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i=1; $i<=50; $i++) {
            $article = new Article;
            $article->setContent($faker->text);
            $article->setTitle(mb_strtolower($faker->sentence()));
            $article->setCategory($this->getReference('categorie_' . $faker->numberBetween($min = 0, $max = 4)));
            $manager->persist($article);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
