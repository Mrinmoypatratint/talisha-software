<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap()
    {
        $articles = Article::published()->latest('published_at')->get();
        $urls = [
            url('/'),
            url('/about'),
            url('/solutions'),
            url('/articles'),
            url('/career'),
            url('/contact'),
            url('/get-in-touch'),
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($u) . '</loc>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>' . ($u === url('/') ? '1.0' : '0.8') . '</priority>';
            $xml .= '</url>';
        }

        foreach ($articles as $a) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(route('articles.show', $a->slug)) . '</loc>';
            $xml .= '<lastmod>' . $a->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
