<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $baseUrl = rtrim(config('app.url'), '/');

        $staticRoutes = [
            route('home', [], false),
            route('about', [], false),
            route('pricing', [], false),
            route('font-artist', [], false),
            route('help', [], false),
            route('tutorials', [], false),
            route('faq', [], false),
            route('fonts.index', [], false),
        ];

        $urls = [];
        foreach ($staticRoutes as $path) {
            $urls[] = [
                'loc' => URL::to($path),
                'priority' => $path === route('home', [], false) ? '1.0' : '0.8',
                'changefreq' => 'weekly',
            ];
        }

        // Fonts details
        Font::query()->select(['id','updated_at'])->orderByDesc('updated_at')->chunk(500, function ($chunk) use (&$urls) {
            foreach ($chunk as $font) {
                $urls[] = [
                    'loc' => route('fonts.show', ['id' => $font->id]),
                    'lastmod' => optional($font->updated_at)->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
                ];
            }
        });

        $xml = view('sitemap.xml', compact('urls'))->render();

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
            'X-Robots-Tag' => 'noindex, follow',
        ]);
    }
}


