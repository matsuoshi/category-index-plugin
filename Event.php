<?php

namespace Plugin\CategoryIndex;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            '@admin/Product/category.twig' => 'onRenderAdminProductCategory',
            'Product/list.twig' => 'onRenderProductList',
        ];
    }

    /**
     * @param TemplateEvent $templateEvent
     */
    public function onRenderAdminProductCategory(TemplateEvent $templateEvent)
    {
        $templateEvent->addSnippet('@CategoryIndex/admin/category.twig');
    }

    /**
     * @param TemplateEvent $templateEvent
     */
    public function onRenderProductList(TemplateEvent $templateEvent)
    {
        $templateEvent->addSnippet('@CategoryIndex/default/category.twig');
    }
}
