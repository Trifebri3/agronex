<?php

if (!function_exists('trans_db')) {
    function trans_db($value) {
        if (is_array($value)) {
            $locale = app()->getLocale();
            return $value[$locale] ?? $value['id'] ?? $value['en'] ?? '';
        }
        if (is_string($value) && str_starts_with(trim($value), '{')) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE && (isset($decoded['id']) || isset($decoded['en']))) {
                $locale = app()->getLocale();
                return $decoded[$locale] ?? $decoded['id'] ?? $decoded['en'] ?? $value;
            }
        }
        return $value;
    }
}

if (!function_exists('compress_and_store_image')) {
    function compress_and_store_image($file, $folder = 'uploads') {
        if (!$file || !$file->isValid()) {
            return null;
        }
        
        $filename = uniqid('img_', true) . '.webp';
        $tempPath = $file->getRealPath();
        
        $compressed = false;
        if (extension_loaded('gd')) {
            try {
                $imageInfo = getimagesize($tempPath);
                if ($imageInfo) {
                    $mime = $imageInfo['mime'];
                    switch ($mime) {
                        case 'image/jpeg':
                            $image = imagecreatefromjpeg($tempPath);
                            break;
                        case 'image/png':
                            $image = imagecreatefrompng($tempPath);
                            if ($image) {
                                imagepalettetotruecolor($image);
                                imagesavealpha($image, true);
                            }
                            break;
                        case 'image/gif':
                            $image = @imagecreatefromgif($tempPath);
                            break;
                        case 'image/webp':
                            $image = @imagecreatefromwebp($tempPath);
                            break;
                        default:
                            $image = false;
                            break;
                    }
                    
                    if ($image) {
                        ob_start();
                        if (imagewebp($image, null, 75)) {
                            $imageStream = ob_get_clean();
                            \Illuminate\Support\Facades\Storage::disk('public')->put($folder . '/' . $filename, $imageStream);

                            // Guarantee availability in public/storage even without symlink
                            $publicDir = public_path('storage/' . $folder);
                            if (!is_dir($publicDir)) {
                                @mkdir($publicDir, 0777, true);
                            }
                            @file_put_contents($publicDir . '/' . $filename, $imageStream);

                            $compressed = true;
                        } else {
                            ob_end_clean();
                        }
                        imagedestroy($image);
                    }
                }
            } catch (\Exception $e) {
                $compressed = false;
            }
        }
        
        if (!$compressed) {
            $originalName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
            \Illuminate\Support\Facades\Storage::disk('public')->putFileAs($folder, $file, $originalName);

            $publicDir = public_path('storage/' . $folder);
            if (!is_dir($publicDir)) {
                @mkdir($publicDir, 0777, true);
            }
            @copy($file->getRealPath(), $publicDir . '/' . $originalName);

            return '/storage/' . $folder . '/' . $originalName;
        }
        
        return '/storage/' . $folder . '/' . $filename;
    }
}
