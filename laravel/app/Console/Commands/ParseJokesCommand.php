<?php

namespace App\Console\Commands;

use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ParseJokesCommand extends Command
{
    protected $signature = 'jokes:parse-and-save';

    protected $description = 'Parse and save jokes';

    public function handle()
    {
        // URL страницы для парсинга
        $url = 'https://vse-shutochki.ru/korotkie-anekdoty';

        // Создаем HTTP-клиент Guzzle
        $client = new Client();

        // Отправляем GET-запрос для получения HTML-кода страницы
        $response = $client->request('GET', $url);

        // Получаем HTML-код страницы
        $html = $response->getBody()->getContents();

        // Создаем объект PHP Simple HTML DOM
        $dom = HtmlDomParser::str_get_html($html);

        // Находим все div'ы с классом "post"
        $posts = $dom->find('div.post');

        // Перебираем все найденные div'ы с классом "post"
        foreach ($posts as $post) {
            // Находим первый div с классом "addSidePadding" внутри текущего div'а "post"
            $firstDiv = $post->find('div.addSidePadding', 0);

            // Проверяем, найден ли элемент
            if ($firstDiv) {
                // Выводим текст первого div'а внутри текущего div'а "post"
                $this->line($firstDiv->plaintext);
            }
        }

        // Освобождаем ресурсы, занятые объектом PHP Simple HTML DOM
        $dom->clear();
        unset($dom);
    }
}
