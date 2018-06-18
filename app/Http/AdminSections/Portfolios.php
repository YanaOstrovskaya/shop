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
 * Class Portfolios
 *
 * @property \App\Portfolio $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Portfolios extends Section implements Initializable
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
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Portfolio::count();
        });

    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
                     return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '№')->setWidth('30px'),
               AdminColumn::text('name', 'Name'),
               AdminColumn::text('filter.name', 'Category'),
               AdminColumn::text('description', 'Description'),
               AdminColumn::text('slug', 'Link'),
               AdminColumn::text('price', 'Price')
           )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
                     return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('slug', 'Link'),
            AdminFormElement::text('price', 'Price')->required(),
             AdminFormElement::select('filter_id', 'Filter', \App\Filter::class)->setDisplay('name'),
            AdminFormElement::wysiwyg('description', 'Description')->required(),
            AdminFormElement::image('images', 'Image')->required()
            ->setUploadSettings([
            'orientate' => [],
            'fit' => [293, 293, function ($constraint) {
            $constraint->upsize();
             $constraint->aspectRatio();
            }]
            ])->setUploadPath(function(\Illuminate\Http\UploadedFile $file) {
    return 'assets/img'; // public/files
})
            ->setUploadFileName(function(\Illuminate\Http\UploadedFile $file) {
            return $file->getClientOriginalName();
            })
        ]);
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
