<?php

namespace App\Console\Commands;

use App\Services\ItemParseService;
use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ParseJokesCommand extends Command
{
    protected $signature = 'jokes:parse-and-save';

    protected $description = 'Parse and save jokes';

    public function handle()
    {
        // URL of the page to parse
        $url = 'https://vse-shutochki.ru/korotkie-anekdoty';

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

                $isAdd = $itemsParseService->storeItemParse($joke);

                $this->line("======== {$counter} ======== (". ($isAdd ? '+' : '-') .") ");
                $this->line($joke);
            }
        }

        // Clear resources occupied by the PHP Simple HTML DOM object
        $dom->clear();
        unset($dom);
    }
}
