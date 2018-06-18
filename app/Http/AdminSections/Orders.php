<?php

namespace App\Http\AdminSections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use AdminColumnEditable;
use AdminColumnFilter;

/**
 * Class Orders
 *
 * @property \App\Order $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Orders extends Section  implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
        public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Order::count();
        });

    }

    public function onDisplay()
    {
           return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '№')->setWidth('30px'),
               AdminColumn::text('name', 'Name'),
               AdminColumn::text('email', 'Email'),
            AdminColumn::text('phone', 'Phone'),
            AdminColumn::text('total_sum', 'Summa'),
            AdminColumn::text('choices', 'Status')
           )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $idOrder = $id;
        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function($id) use ($idOrder){
            $t = [];
            $t[] = AdminDisplay::tab(
            AdminDisplay::table()
            ->setModelClass(\App\OrderItem::class)
            ->setApply(function($query) use ($idOrder){
                $query->where('order_id', $idOrder);
            })
            ->with('portfolio')
            ->setColumns(
                AdminColumn::text('portfolio.name', 'Product'),
                AdminColumn::image('portfolio.images', 'Image'),
                AdminColumn::text('price', 'Price'),
                AdminColumn::text('qty', 'Qty')

            )->paginate(50)
        )->setLabel('Product Info');

        $t[] = AdminDisplay::tab(
            AdminForm::elements([
            AdminFormElement::text('name', 'Name'),
            AdminFormElement::text('phone', 'Phone'),
            AdminFormElement::select('choices', 'Status', ['processing'=>'processing', 'done'=>'done'])
             ])

        )->setLabel('Order Info'); 
            return $t;
        });
return AdminForm::panel()->addBody([$tabs]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
