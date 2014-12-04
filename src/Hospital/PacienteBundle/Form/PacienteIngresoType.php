<?php

namespace Hospital\PacienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PacienteIngresoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('expediente','text', [
                    'label' =>  '* Expediente',
                    'attr'  =>  [
                        'placeholder'   =>  'AI-AN-MN-DN-CC',
                    ],
                ])
                ->add('paterno', 'text', [
                    'label' =>  '* Apellido Paterno',
                ])
                ->add('materno','text', [
                    'label' =>  '* Apellido Materno',
                ])
                ->add('nombre', 'text', [
                    'label' =>  '* Nombre (s)',
                ])        
                ->add('ingresos', new IngresoType(), array(
                    'label' => 'Pruebas',
                    'attr' => array(
                        'class' => 'well',
                    )
                ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hospital\PacienteBundle\Entity\Paciente'
        ));
    }

    public function getName()
    {
        return 'paciente_ingreso';
    }
}
