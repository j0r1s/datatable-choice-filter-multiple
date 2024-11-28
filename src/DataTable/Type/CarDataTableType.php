<?php

declare(strict_types=1);

namespace App\DataTable\Type;

use App\Enum\ColorEnum;
use Kreyu\Bundle\DataTableBundle\Bridge\Doctrine\Orm\Filter\Type\StringFilterType;
use Kreyu\Bundle\DataTableBundle\Column\Type\EnumColumnType;
use Kreyu\Bundle\DataTableBundle\Column\Type\TextColumnType;
use Kreyu\Bundle\DataTableBundle\DataTableBuilderInterface;
use Kreyu\Bundle\DataTableBundle\Filter\FilterData;
use Kreyu\Bundle\DataTableBundle\Filter\Operator;
use Kreyu\Bundle\DataTableBundle\Type\AbstractDataTableType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarDataTableType extends AbstractDataTableType
{
    public function buildDataTable(DataTableBuilderInterface $builder, array $options): void
    {
        $builder
            ->addFilter('color', StringFilterType::class, [
                'label' => 'Color',
                'form_type' => EnumType::class,
                'form_options' => [
                    'class' => ColorEnum::class,
                    'multiple' => true,
                    'expanded' => true,
                ],
                'default_operator' => Operator::In,
            ])
            ->addColumn('name', TextColumnType::class, [
                'label' => 'Name',
                'sort' => true,
            ])
            ->addColumn('color', EnumColumnType::class, [
                'label' => 'Color',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your default data table options here
        ]);
    }
}
