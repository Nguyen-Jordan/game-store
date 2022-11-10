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
        
      $this->createCategory('PlayStation 5', $parent, 2, $manager);
      $this->createCategory('PlayStation 4', $parent,3, $manager);
      $this->createCategory('Xbox One', $parent,4, $manager);
      $this->createCategory('Xbox Series', $parent,5, $manager);
      $this->createCategory('Switch', $parent,6, $manager);
      $this->createCategory('PC', $parent,7, $manager);
  
      $parent = $this->createCategory('Console', null,8, $manager);
      
      $this->createCategory('PlayStation 5', $parent,9, $manager);
      $this->createCategory('PlayStation 4', $parent,10, $manager);
      $this->createCategory('Xbox One', $parent,11, $manager);
      $this->createCategory('Xbox Series', $parent,12, $manager);
      $this->createCategory('Switch', $parent,13, $manager);
      $this->createCategory('PC', $parent,14, $manager);
  
      $parent = $this->createCategory('Accessoires', null,15, $manager);
      $this->createCategory('Casque', $parent,16, $manager);
      $this->createCategory('Son', $parent,17, $manager);
      $this->createCategory('Micro', $parent,18, $manager);
      $this->createCategory('Camera', $parent,19, $manager);
      $this->createCategory('Casque VR', $parent,20, $manager);
      
      $manager->flush();
    }
    
    public function createCategory(string $name, Categories $parent = null, int $categoryOrder, ObjectManager $manager)
    {
      $category = new Categories();
      $category->setName($name);
      $category->setSlug($this->slugger->slug($category->getName())->lower());
      $category->setParent($parent);
      $category->setCategoryOrder($categoryOrder);
      $manager->persist($category);
      
      $this->addReference('cat-'.$this->counter, $category);
      $this->counter++;
      
       return $category;
    }
}
