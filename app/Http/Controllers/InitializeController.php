<?php

namespace App\Http\Controllers;
use App\Entity\TrashCategory;

class InitializeController extends Controller
{
    public function index()
    {
        $categories = TrashCategory::all();

        $categoriesArr = [];

        foreach ($categories as $key => $category) {
            $categoriesArr[$category->id] = $category->name;
        }

        return response()->json([
                'type_of_trash' => $categoriesArr
            ]
        );
    }
}
