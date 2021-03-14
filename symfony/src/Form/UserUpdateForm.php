<?php

namespace App\Form;

use App\Service\DepartmentService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class UserUpdateForm extends AbstractType
{
    /**
     * @var DepartmentService
     */
    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $userName = $options['data']['name'] ?? null;
        $userEmail = $options['data']['email'] ?? null;

        $builder
            ->add('name', TextType::class, [
                'data' => $userName,
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'data' => $userEmail,
                'constraints' => [
                    new Assert\Email([
                        'message' => 'This is not the correct email format'
                    ]),
                    new Assert\NotBlank([
                        'message' => 'This field can not be blank'
                    ])
                ]
            ])
            ->add('department', ChoiceType::class, [
                'choices' => $this->departmentService->getAllAssociativeDepartmentNames()
            ])
            ->add('submit', SubmitType::class);
    }
}
