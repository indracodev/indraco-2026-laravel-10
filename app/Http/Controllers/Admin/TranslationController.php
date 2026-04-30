<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $idPath = base_path('lang/id.json');
        $enPath = base_path('lang/en.json');

        $idData = File::exists($idPath) ? json_decode(File::get($idPath), true) : [];
        $enData = File::exists($enPath) ? json_decode(File::get($enPath), true) : [];

        // Merge keys to ensure we get all available keys
        $allKeys = array_unique(array_merge(array_keys($idData), array_keys($enData)));
        
        // Define groups based on prefix
        $groupLabels = [
            'home' => 'Home Page',
            'about' => 'About Us',
            'nav' => 'Navigation Menu',
            'footbar' => 'Footer',
            'brand' => 'Brand Categories',
            'product' => 'Products Page',
            'general' => 'Umum (General)'
        ];

        $groupedTranslations = [];
        foreach ($groupLabels as $gKey => $gLabel) {
            $groupedTranslations[$gKey] = [];
        }

        // Prepare search filter
        $search = $request->input('search');
        
        foreach ($allKeys as $key) {
            // Apply search filter if present
            if ($search) {
                $matchKey = stripos($key, $search) !== false;
                $matchId = isset($idData[$key]) && stripos($idData[$key], $search) !== false;
                $matchEn = isset($enData[$key]) && stripos($enData[$key], $search) !== false;
                
                if (!$matchKey && !$matchId && !$matchEn) {
                    continue;
                }
            }
            
            // Determine group
            $prefix = explode('_', $key)[0];
            $groupKey = array_key_exists($prefix, $groupLabels) ? $prefix : 'general';
            
            $groupedTranslations[$groupKey][$key] = [
                'id' => $idData[$key] ?? '',
                'en' => $enData[$key] ?? '',
            ];
        }

        // Remove empty groups if searching
        if ($search) {
            $groupedTranslations = array_filter($groupedTranslations, function($group) {
                return count($group) > 0;
            });
        }

        return view('admin.translations.index', compact('groupedTranslations', 'groupLabels', 'search'));
    }

    public function update(Request $request)
    {
        $idPath = base_path('lang/id.json');
        $enPath = base_path('lang/en.json');
        
        $idData = File::exists($idPath) ? json_decode(File::get($idPath), true) : [];
        $enData = File::exists($enPath) ? json_decode(File::get($enPath), true) : [];

        $inputTranslations = $request->input('translations', []);

        foreach ($inputTranslations as $key => $values) {
            if (isset($values['id'])) {
                $idData[$key] = $values['id'];
            }
            if (isset($values['en'])) {
                $enData[$key] = $values['en'];
            }
        }

        // Write back to files
        File::put($idPath, json_encode($idData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        File::put($enPath, json_encode($enData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        return redirect()->back()->with('success', 'Teks terjemahan berhasil diperbarui.');
    }
}
