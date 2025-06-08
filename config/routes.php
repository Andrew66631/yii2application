<?php
return [
    'product/<id:\d+>' => 'product/view',
    'product' => 'product/index',
    'purchase' => 'product/purchase',
    'user/<id:\d+>' => 'user/view',
    'user' => 'user/index',
    'user/create' => 'user/create',
    'user/update/<id:\d+>' => 'user/update',
    'user/delete/<id:\d+>' => 'user/delete',

];
