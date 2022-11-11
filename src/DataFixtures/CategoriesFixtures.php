<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private  $counter = 1;
    public function __construct(private SluggerInterface $slugger){}
  
    public function load(ObjectManager $manager): void
    {
      $parent = $this->createCategory('Jeux Vidéo', null, 1, $manager);
        
      $this->createCategory('PlayStation 5', $parent, $manager);
      $this->createCategory('PlayStation 4', $parent, $manager);
      $this->createCategory('Xbox One', $parent, $manager);
      $this->createCategory('Xbox Series', $parent, $manager);
      $this->createCategory('Switch', $parent, $manager);
      $this->createCategory('PC', $parent, $manager);
  
      $parent = $this->createCategory('Console', null, $manager);
      
      $this->createCategory('PlayStation 5', $parent, $manager);
      $this->createCategory('PlayStation 4', $parent, $manager);
      $this->createCategory('Xbox One', $parent, $manager);
      $this->createCategory('Xbox Series', $parent, $manager);
      $this->createCategory('Switch', $parent, $manager);
      $this->createCategory('PC', $parent, $manager);
  
      $parent = $this->createCategory('Accessoires', null, $manager);
      $this->createCategory('Casque', $parent, $manager);
      $this->createCategory('Son', $parent, $manager);
      $this->createCategory('Micro', $parent, $manager);
      $this->createCategory('Camera', $parent, $manager);
      $this->createCategory('Casque VR', $parent, $manager);
      
      $manager->flush();
    }
    
    public function createCategory(string $name, Categories $parent = null, ObjectManager $manager)
    {
      $category = new Categories();
      $category->setName($name);
      $category->setSlug($this->slugger->slug($category->getName())->lower());
      $category->setParent($parent);
      $manager->persist($category);
      
      $this->addReference('cat-'.$this->counter, $category);
      $this->counter++;
      
       return $category;
    }
}
