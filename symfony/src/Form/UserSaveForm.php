<?php

namespace App\Form;

use App\Entity\Department;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserSaveForm extends AbstractType
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, empty($options['data']) ? [] : ['data' => $options['data']['name']])
            ->add('email', TextType::class, empty($options['data']) ? [] : ['data' => $options['data']['email']])
            ->add('department', ChoiceType::class, [
                'choices' => $this->getAllDepartmentNames()
            ])
            ->add('submit', SubmitType::class);
    }

    public function getAllDepartmentNames(): array
    {
        $preparedNames = [];
        $departmentNames = $this->em->getRepository(Department::class)->getAllDepartmentNames();
        foreach ($departmentNames as $departmentName) {
            $preparedNames[$departmentName] = $departmentName;
        }
        return $preparedNames;
    }
}
