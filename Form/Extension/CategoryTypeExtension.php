<?php

namespace Plugin\CategoryIndex\Form\Extension;

use Eccube\Common\EccubeConfig;
use Eccube\Form\Type\Admin\CategoryType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryTypeExtension extends AbstractTypeExtension
{
    /**
     * @var EccubeConfig
     */
    private $eccubeConfig;

    public function __construct(EccubeConfig $eccubeConfig )
    {
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextareaType::class, [
                'label' => trans('category_index.admin.description.title'),
                'required' => false,
                'attr' => [
                    'placeholder' => trans('category_index.admin.description.placeholder'),
                ],
                'eccube_form_options' => [
                    'auto_render' => true,
                ],
                'constraints' => [
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return CategoryType::class;
    }
}
