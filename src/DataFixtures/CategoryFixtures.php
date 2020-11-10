<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryFixtures extends Fixture
{
    private $slugger;

    public function __construct( SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $designCategory = new Category();
        $designCategory->setName('Design');
        $designCategory->setSlug($this->slugger->slug('Design')->lower());

        $programmingCategory = new Category();
        $programmingCategory->setName('Programming');
        $programmingCategory->setSlug($this->slugger->slug('Programming')->lower());

        $managerCategory = new Category();
        $managerCategory->setName('Manager');
        $managerCategory->setSlug($this->slugger->slug('Manager')->lower());

        $administratorCategory = new Category();
        $administratorCategory->setName('Administrator');
        $administratorCategory->setSlug($this->slugger->slug('Administrator')->lower());

        $manager->persist($designCategory);
        $manager->persist($programmingCategory);
        $manager->persist($managerCategory);
        $manager->persist($administratorCategory);

        $manager->flush();

        $this->addReference('category-design', $designCategory);
        $this->addReference('category-programming', $programmingCategory);
        $this->addReference('category-manager', $managerCategory);
        $this->addReference('category-administrator', $administratorCategory);
    }
}
