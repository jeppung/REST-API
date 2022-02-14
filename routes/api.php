<?php

use App\Http\Controllers\ItemsController;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('items', function(){
    return Item::paginate();
});


Route::get('items/{item}', function(Item $item){
    return $item;
});

Route::post('items', function(){
    return Item::create(request()->all());
});

Route::delete('items/{item}', function(Item $item){
    if(Item::destroy($item->id)){
        return 'delete success';
    }

    return 'delete failed';
});