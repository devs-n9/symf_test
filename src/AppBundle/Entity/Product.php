<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validation\Constraints AS Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category_id;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getCategory()
    {
        return $this->category_id;
    }
    
    public function setCategory($id)
    {
        $this->category_id = $id;
    }
    
    
}