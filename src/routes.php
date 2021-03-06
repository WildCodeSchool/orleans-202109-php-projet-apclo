<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'admin/actualites/index' => ['AdminActualityController', 'index',],
    'admin/actualites/ajouter' => ['AdminActualityController', 'add',],
    'admin/actualites/editer' => ['AdminActualityController', 'edit', ['id']],
    'admin/actualites/supprimer' => ['AdminActualityController', 'delete',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'admin/membres' => ['AdminAssociationController', 'index',],
    'admin/membre/ajouter' => ['AdminAssociationController', 'add',],
    'admin/chat/editer' => ['AdminCatController', 'edit', ['id']],
    'admin/chats' => ['AdminCatController', 'index',],
    'admin/chat/ajouter' => ['AdminCatController', 'add'],
    'admin/chat/supprimer' => ['AdminCatController', 'delete'],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'contact' => ['ContactController', 'index',],
    'chats/show' => ['CatController','show', ['id']],
    'chats' => ['CatController', 'index'],
    'actualities' => ['ActualityController', 'index'],
    'association' => ['AssociationController', 'index'],
];
