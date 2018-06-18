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

/**
 * Class Peoples
 *
 * @property \App\People $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Peoples extends Section implements Initializable
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
            return \App\People::count();
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
               AdminColumn::text('position', 'Position'),
               AdminColumn::text('text', 'Text')
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
            AdminFormElement::text('position', 'Position')->required(),
            AdminFormElement::textarea('text', 'Text')->required(),
            AdminFormElement::image('images', 'Image')->required()
            ->setUploadSettings([
            'orientate' => [],
            'resize' => [293, 293, function ($constraint) {
            $constraint->upsize();
             $constraint->aspectRatio();
            }],
            ])->setUploadFileName(function(\Illuminate\Http\UploadedFile $file) {
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
