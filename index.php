<?php

/* 1. Создать галерею изображений, состоящую из двух страниц:
a. Просмотр всех фотографий (уменьшенных копий).
b. Просмотр конкретной фотографии (изображение оригинального размера).
c.
Все страницы вывода на экран – это twig-шаблоны. Вся логика – на backend.
d. * Реализовать хранение ссылок и информации по картинкам в БД. */

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$template = $twig->load('index.html.twig');

$images = [
	'1.jpg',
	'2.jpg',
	'3.jpg'
    ];

echo $template->render(array (
	'images' => $images
));

