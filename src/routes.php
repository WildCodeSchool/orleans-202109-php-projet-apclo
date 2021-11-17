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
    'admin/actualites/éditer' => ['AdminActualityController', 'edit', ['id']],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'admin/chat/editer' => ['AdminCatController', 'index', ['id']],
    'admin/chat/index' => ['AdminShowCatController', 'index'],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'contact' => ['ContactController', 'index',],
    'chats/show' => ['CatController','show', ['id']],
    'chats' => ['CatController', 'index'],
    'association' => ['AssociationController', 'index'],
    'actualities' => ['ActualityController', 'index'],
];
