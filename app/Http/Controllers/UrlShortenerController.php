<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UrlShortenerController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $urls = ShortUrl::where('user_id', Auth::id())->latest()->paginate(10);
        } else {
            // Ziyaretçiler için session'da saklanan son URL'yi getir
            $lastShortCode = session('last_short_code');
            $urls = $lastShortCode 
                ? ShortUrl::where('short_code', $lastShortCode)->get() 
                : collect();
        }
        
        $theme = config('theme.active', 'tema_1');
        return view("themes.{$theme}.urls.index", compact('urls'));
    }

    public function create()
    {
        $theme = config('theme.active', 'tema_1');
        return view("themes.{$theme}.urls.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),
            'visits' => 0,
            'user_id' => Auth::check() ? Auth::id() : null
        ]);

        // Ziyaretçiler için son oluşturulan URL'nin kodunu session'da sakla
        if (!Auth::check()) {
            session(['last_short_code' => $shortUrl->short_code]);
        }

        return redirect()->route('urls.index')
            ->with('success', 'URL başarıyla kısaltıldı!');
    }

    public function redirect($shortCode)
    {
        $url = ShortUrl::where('short_code', $shortCode)->firstOrFail();
        $url->increment('visits');

        return redirect($url->original_url);
    }

    public function reports()
    {
        $query = Auth::check() ? ShortUrl::where('user_id', Auth::id()) : ShortUrl::query();

        // Günlük ziyaret istatistikleri
        $dailyStats = $query->select(
            DB::raw('DATE(updated_at) as date'),
            DB::raw('SUM(visits) as total_visits'),
            DB::raw('COUNT(*) as total_urls')
        )
        ->whereNotNull('updated_at')
        ->groupBy(DB::raw('DATE(updated_at)'))
        ->orderBy('date', 'desc')
        ->limit(7)
        ->get();

        // En çok ziyaret edilen URLler
        $topUrls = $query->select([
            'id',
            'original_url',
            'short_code',
            'visits',
            'created_at',
            'updated_at'
        ])
        ->where('visits', '>', 0)
        ->orderBy('visits', 'desc')
        ->limit(5)
        ->get();

        // Genel istatistikler
        $generalStats = [
            'total_urls' => $query->count(),
            'total_visits' => $query->sum('visits'),
            'avg_visits' => round($query->where('visits', '>', 0)->avg('visits') ?? 0, 2),
            'urls_without_visits' => $query->where('visits', 0)->count(),
            'most_visited_today' => $query->select([
                'id',
                'original_url',
                'short_code',
                'visits',
                'created_at',
                'updated_at'
            ])
            ->whereDate('updated_at', today())
            ->orderBy('visits', 'desc')
            ->first(),
            'total_visits_today' => $query->whereDate('updated_at', today())
                ->sum('visits'),
        ];

        $theme = config('theme.active', 'tema_1');
        return view("themes.{$theme}.urls.reports", compact('dailyStats', 'topUrls', 'generalStats'));
    }
}
