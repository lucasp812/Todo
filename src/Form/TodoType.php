<?php

namespace App\Form;

use App\Entity\Todo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Priority;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType; 

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name')
        ->add('description', TextareaType::class)
        ->add('done', CheckboxType::class, [
            'label' => 'Done',
            'required' => false,
        ])
        ->add('priority', EntityType::class, [
            'class' => Priority::class,
            'choice_label' => 'level',
        ])
    ;
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
