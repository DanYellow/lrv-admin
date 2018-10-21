<?php

namespace App\Form\Type;

use App\Entity\GalleryItem;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

class GalleryType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('image', EntityType::class, array(
            'class' => GalleryItem::class,
            'choice_label' => function ($category) {
                return $category->getImage();
            }
        ));
    }
}