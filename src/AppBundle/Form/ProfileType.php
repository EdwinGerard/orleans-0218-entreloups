<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 29/05/18
 * Time: 15:19
 */

namespace AppBundle\Form;

use AppBundle\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array('label' => 'Prénom :', 'translation_domain' => 'FOSUserBundle'))
            ->add('lastName', TextType::class, array('label' => 'Nom :', 'translation_domain' => 'FOSUserBundle'))
            ->add('location', TextType::class, array('label' => 'Ville :', 'translation_domain' => 'FOSUserBundle'))
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'label' => 'Choisissez vos domaines d\'intérêt par mots clés :',
                'expanded' => true,
                'multiple' => true,
            ]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}
