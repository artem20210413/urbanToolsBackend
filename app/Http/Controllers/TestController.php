<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Intervention\Image\Facades\Image;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{


    public function storeImage1(Request $request)
    {
        $request->validate([
//            'image' => 'required|image|max:2048', // Максимальный размер в байтах (2 МБ)
            'images' => 'required|image|max:10240', // Максимальный размер в байтах (10 МБ)
        ]);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
//            file_put_contents('gg.img', $file);
            $res = [];
            foreach ($images as $key => $image) {
                $fileName = "custom-name-$key.jpg"; // Укажите желаемое имя файла
                $path = $image->storeAs('images', $fileName, 'public');
                $res[] = 'storage/' . $path;
            }

            dd($res);
            return response()->json(['message' => 'Изображение успешно сохранено']);
        }

        return response()->json(['message' => 'Изображение не найдено'], 400);


//        <form action="/upload" method="POST" enctype="multipart/form-data">
//        @csrf
//    <input type="file" name="images[]" multiple>
//    <button type="submit">Загрузить</button>
//</form>
    }

    public function storeImage(Request $request)
    {

        $request->validate([
            'images.*' => 'required|image|max:10240', // Максимальный размер 10 МБ
        ]);

//        dd($request);
//        if ($request->hasFile('images')) {
        $images = $request->file('images');
//        $image2 = $request->file('image2');
//dd($images);
//        dump('satart');
//        dd($images);
        foreach ($images as $image) {
//            dump($image);
//             Валидация и сохранение каждой загруженной картинки
            if ($image->isValid()) {
                $filename = $image->getClientOriginalName();
                $path[] = $image->storeAs('images', $filename, 'public');

//                dd($path);
//                 Дополнительные операции с сохраненными картинками, если нужно
            }
        }
        return response()->json(['message' => 'Картинки успешно загружены']);
//        }
//dd('end');
        return response()->json(['message' => 'Нет выбранных картинок'], 400);
    }


}
