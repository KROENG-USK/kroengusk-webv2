<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Pick up the necessary components for the display.
     *
     * @return array
     */
    protected function _componentsClient()
    {
        return [
            'listdivisi' => \App\Ext\Client\DivisiHeader::get(),
            'listdocument' => \App\Ext\Client\DocumentsHeader::get(),
            'categories' => \App\Ext\Client\SidebarController::get()['categories'],
            'recentNews' => \App\Ext\Client\SidebarController::get()['recentNews']
        ];
    }
}
