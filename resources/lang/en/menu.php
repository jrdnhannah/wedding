<?php declare(strict_types = 1);

return array_merge(
    config('wedding.menu.adult.starter'),
    config('wedding.menu.adult.main'),
    config('wedding.menu.adult.dessert'),
    config('wedding.menu.childrens.starter'),
    config('wedding.menu.childrens.main'),
    config('wedding.menu.childrens.dessert')
);