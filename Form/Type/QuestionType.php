<?php

namespace Smirik\QuizBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class QuestionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
            'quiz',
            'model',
            array(
                'class' => 'Smirik\QuizBundle\Model\Quiz',
                'multiple' => true,
                'required' => false,
            )
        )
            ->add('text')
            ->add(
            'type',
            'choice',
            array(
                'choices' => array('text' => 'text', 'radio' => 'radio')
            )
        )
            ->add('file', 'file', array('required' => false))
            ->add('num_answers')
            ->add(
            'answers',
            'collection',
            array(
                'type' => new \Smirik\QuizBundle\Form\Type\AnswerType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            )
        );
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Smirik\QuizBundle\Model\Question',
        );
    }

    public function getName()
    {
        return 'Question';
    }

}

