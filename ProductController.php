<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @param ManagerRegistry $managerRegistry
     * @return Response
     */
    public function getProduct($product_id, ManagerRegistry $managerRegistry): Response
    {
        $manager = $managerRegistry->getRepository(Product::class);
        $product = $manager->find($product_id);
        foreach ($product->getImages() as $image) {
            var_dump($image);
        }
        die();
    }

    public function insertProduct(ManagerRegistry $managerRegistry) {
        $manager = $managerRegistry->getManager();
        $image1 = new Image();
        $image1->setPath('path1');
        $image2 = new Image();
        $image2->setPath('path2');
        
        $product = new Product();
        $product->setTitle('Title');
        $product->setDescription('Description');
        $product->setPrice(100);
        $image1->setProduct($product);
        $image2->setProduct($product);
        $product->addImage($image1);
        $product->addImage($image2);

        $manager->persist($product);
        $manager->persist($image1);
        $manager->persist($image2);
        $manager->flush();
    }
}
