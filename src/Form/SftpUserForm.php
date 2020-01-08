<?php
namespace App\Form;

use App\Entity;
use Azura\Config;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SftpUserForm extends EntityForm
{
    public function __construct(
        EntityManager $em,
        Serializer $serializer,
        ValidatorInterface $validator,
        Config $config
    ) {
        $form_config = $config->get('forms/sftp_user');

        parent::__construct($em, $serializer, $validator, $form_config);

        $this->entityClass = Entity\SftpUser::class;
    }
}
