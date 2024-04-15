<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        //find: se nao encontrar retorna null / findOrFail: se nao encontra lança uma exception: Gera um 404
        // $stores = Store::findOrFail(20);
        $stores = Store::all();

        return view('exemplo', compact('stores')); // php.net/compact | php.net/extract
    }

    public function store()
    {
        // //Criar: Active Record
        // $store = new Store();
        // $store->name = 'Loja Exemplo 2';
        // $store->description = 'Descriçao da Loja';
        // $store->about = 'Contexto da Loja';
        // $store->phone = '+559923232323';
        // $store->whatsapp = '+559923232323';

        // $store->save();

        // dump($store);

        //Atualizar: Active Record
        // $store = Store::findOrFail(7);

        // $store->name = 'Loja Exemplo 2 Editado...';

        // $store->save();

        // dump($store);


        //=================================================

        //Create: Mass Assignment...

        // $store = Store::create([
        //     'name' => 'Loja Exemplo 2',
        //     'description' => 'Descriçao da Loja',
        //     'about' => 'Contexto da Loja',
        //     'phone' => '+559923232323',
        //     'whatsapp' => '+559923232323',
        // ]);

        // dump($store);

        // $store = Store::findOrFail(9);
        // $store->update([
        //     'name' => 'Loja Exemplo 2 Editado...',
        // ]);

        // dump($store);

        //Delete
        // $store = Store::findOrFail(9);
        // $store->delete();

        // dump($store);
    }
}
