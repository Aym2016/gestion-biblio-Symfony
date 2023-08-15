<?php

namespace App\DataFixtures;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {   $this->$this->categorieload($manager);
        // $product = new Product();
        // $manager->persist($product);

        
    }
    public function categorieload(ObjectManager $manager)
    {
      for($i=1;$i<=7;$i++)
      {
        $categorie=new Categorie();
        $categorie->setNom("categorie $i");
        $this->addReference("categorie_$i",$categorie);
        $manager->persist($categorie); 
      }

    $manager->flush();

    }
}
