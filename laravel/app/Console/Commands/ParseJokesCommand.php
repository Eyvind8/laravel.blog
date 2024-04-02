<?php

namespace App\Console\Commands;

use App\Services\ItemParseService;
use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ParseJokesCommand extends Command
{
    protected $signature = 'jokes:parse-and-save {--page=1 : The page number}';

    protected $description = 'Parse and save jokes';

    public function handle()
    {
        // URL of the page to parse
        $url = 'https://vse-shutochki.ru/korotkie-anekdoty/';

        $page = $this->option('page');
        if ($page > 1) {
            $url .= $page;
        }

        // Create Guzzle HTTP client
        $client = new Client();

        // Send GET request to fetch the HTML content of the page
        $response = $client->request('GET', $url);

        // Get the HTML content of the page
        $html = $response->getBody()->getContents();

        // Create PHP Simple HTML DOM object
        $dom = HtmlDomParser::str_get_html($html);

        // Find all div elements with class "post"
        $posts = $dom->find('div.post');

        /** @var ItemParseService $itemsParseService */
        $itemsParseService = app()->make(ItemParseService::class);

        $counter = 0;

        // Iterate through all found div elements with class "post"
        foreach ($posts as $post) {
            // Find the first div element with class "addSidePadding" inside the current "post" div
            $firstDiv = $post->find('div.addSidePadding', 0);

            // Check if the element is found
            if ($firstDiv) {
                // Output the plaintext of the first div element inside the current "post" div
                $joke = trim($firstDiv->plaintext);

                $itemsParseService->storeItemParse($joke);

                $this->line("======== {$counter} ========");
                $this->line($joke);
                $this->line('<br>');
                $counter++;
            }
        }

        // Clear resources occupied by the PHP Simple HTML DOM object
        $dom->clear();
        unset($dom);
    }
}
