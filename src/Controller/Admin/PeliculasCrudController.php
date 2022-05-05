<?php

namespace App\Controller\Admin;

use App\Entity\Peliculas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PeliculasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peliculas::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titulo'),
            DateField::new('fechaPublicacion'),
            TextField::new('genero'),
            NumberField::new('duracion'),
            TextField::new('productora'),
            AssociationField::new('director'),
            AssociationField::new('actor'),
        ];
    }

}
