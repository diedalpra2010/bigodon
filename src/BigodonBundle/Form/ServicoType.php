<?php

namespace BigodonBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ServicoType extends AbstractType 
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome', TextType::class, array(
                    "label" => "Nome:", "label_attr" => array("class" => "msg-erro")
                ))
                ->add('descricao', TextareaType::class, array (
                    "label" => "Descrição do Serviço:"
                ))
                
                ->add('valor', MoneyType::class, array(
                "currency" => "BRL",
                "grouping" =>  1, 
                "label"    => "Valor (Reais):"
                ))
                
                ->add('duracao', IntegerType::class, array (
                    "label" => "Duração do Serviço (Minutos):"
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BigodonBundle\Entity\Servico'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bigodonbundle_servico';
    }


}
