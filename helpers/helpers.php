<?php

if (!function_exists('success')) {
    function success(mixed $data = [], int $status = 200): Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $status);
    }
}

if (!function_exists('error')) {
    function error(\Exception $e): Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ]
        ], method_exists($e, 'getStatus') ? $e->getStatus() : 400);
    }
}

if (!function_exists('aliasGeneration')) {
    function aliasGeneration($string) {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
        );

        // Replace Cyrillic characters with Latin characters using the $converter array
        $result = strtr($string, $converter);

        // Remove all remaining characters that could not be transliterated
        $result = preg_replace('/\W+/', '_', $result);

        // Remove extra hyphens
        $result = preg_replace('/-+/', '_', $result);

        // Remove hyphens from the beginning and end of the string
        $result = trim($result, '-');

        // Convert to lower case (if needed)
         $result = strtolower($result);

        return $result;
    }


}


