<?php

namespace FOS\MessageBundle\FormFactory;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactoryInterface;
use FOS\MessageBundle\FormModel\AbstractMessage;

/**
 * Instanciates message forms
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 */
abstract class AbstractMessageFormFactory
{
    /**
     * The Symfony form factory
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * The message form type
     *
     * @var AbstractType
     */
    protected $formType;

    /**
     * The name of the form
     *
     * @var string
     */
    protected $formName;

    /**
     * The FQCN of the message model
     *
     * @var string
     */
    protected $messageClass;

    /**
     * The validation groups
     *
     * @var array
     */
    protected $validationGroups;

    public function __construct(FormFactoryInterface $formFactory, AbstractType $formType, $formName, $messageClass, $validationGroups)
    {
        $this->formFactory = $formFactory;
        $this->formType = $formType;
        $this->formName = $formName;
        $this->messageClass = $messageClass;
        $this->validationGroups = $validationGroups;
    }

    /**
     * Creates a new instance of the form model
     *
     * @return AbstractMessage
     */
    protected function createModelInstance()
    {
        $class = $this->messageClass;

        return new $class();
    }
}
