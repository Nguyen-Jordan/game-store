<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(
      private UserPasswordHasherInterface $passwordHasher,
      private SluggerInterface $slugger
    ){}
  
    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@game-store.com');
        $admin->setFirstname('John');
        $admin->setLastname('Doe');
        $admin->setAddress('24 rue de la chance');
        $admin->setZipcode('74940');
        $admin->setCity('Annecy');
        $admin->setPassword(
          $this->passwordHasher->hashPassword($admin, 'VivaLaVida')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        
        $manager->persist($admin);
        
        $faker = Faker\Factory::create('fr_FR');
        
        for ($usr = 1; $usr <= 5; $usr++){
          $user = new Users();
          $user->setEmail($faker->email);
          $user->setFirstname($faker->firstName);
          $user->setLastname($faker->lastName);
          $user->setAddress($faker->streetAddress);
          $user->setZipcode(str_replace('', '', $faker->postcode));
          $user->setCity($faker->city);
          $user->setPassword(
            $this->passwordHasher->hashPassword($user, 'MamaMia')
          );
  
          $manager->persist($user);
        }
        
        $manager->flush();
    }
}
