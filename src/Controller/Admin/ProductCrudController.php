<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('image')
            ->setBasePath($this->getParameter("product_images"))
            ->onlyOnIndex()
            ,
            AssociationField::new('category'),
            TextField::new('description'),
            TextareaField::new('imageFile',"Product image")
            ->setFormType((VichImageType::class))
            ->hideOnIndex()
            ->setFormTypeOption("allow_delete",false)
            ,
            NumberField::new('price'),
            BooleanField::new('status'),
            
        ];
    }
}
