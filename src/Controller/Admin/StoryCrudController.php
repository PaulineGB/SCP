<?php

namespace App\Controller\Admin;

use App\Entity\Story;
use App\Entity\Image;
use App\Entity\Menace;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class StoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Story::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Rapports SCP')
            ->setPageTitle(Crud::PAGE_NEW, 'Nouveau rapport')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détails')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier');
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [];
        if ($pageName == Crud::PAGE_INDEX) {
            array_push(
                $fields,
                TextField::new('title', 'Titre'),
                NumberField::new('number', 'Numéro'),
                DateField::new('createdAt', 'Date'),
                BooleanField::new('isValidated', 'Validation'),
            );
        }

        if ($pageName == Crud::PAGE_EDIT || $pageName == Crud::PAGE_NEW) {
            array_push(
                $fields,
                TextField::new('title', 'Titre'),
                NumberField::new('number', 'Numéro'),
                DateField::new('createdAt', 'Date'),
                TextEditorField::new('content', 'Resumé'),
                AssociationField::new('menace', 'Menaces'),
                AssociationField::new('image', 'Images'),
                AssociationField::new('user', 'Auteur'),
                BooleanField::new('isValidated', 'Validation'),
            );
        }

        if ($pageName == Crud::PAGE_DETAIL) {
            array_push(
                $fields,
                TextField::new('title', 'Titre'),
                NumberField::new('number', 'Numéro'),
                DateField::new('createdAt', 'Date'),
                TextEditorField::new('content', 'Resumé'),
                AssociationField::new('menace', 'Menaces'),
                AssociationField::new('image', 'Images'),
                AssociationField::new('user', 'Auteur'),
                BooleanField::new('isValidated', 'Validation'),
            );
        }

        return $fields;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter un rapport');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter un rapport');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Créer et ajouter un nouveau');
            })
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setLabel('Revenir au listing');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Enregistrer et continuer');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Enregistrer');
            })
        ;
    }
}
