<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EntityType;

class GalleryType extends AbstractType 
{
    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getParent()
    {
        return EntityType::class;
    }
}