<?php

namespace App\Controller\Admin;

use App\Entity\Menace;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MenaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menace::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
