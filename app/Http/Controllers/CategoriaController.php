<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        //mesma coisa que select *from categoria
        $categorias = Categoria::all();

        //$categoria = Categoria::where("cat_ativo", "1")->get();

        

        return view('categoria.index', compact('categorias'));
    }

    public function IncluirCategoria(Request $request){
        //$_post['cat_nome']
        $cat_nome = $request->input("cat_nome");
        $cat_descricao = $request->input("cat_descricao");
        echo $cat_nome;

        $nova = new categoria;
        $nova->cat_nome = $cat_nome;
        $nova->cat_descricao = $cat_descricao;
        $nova->cat_ativo = 0;
        $nova->save();

        return redirect('/categoria');
    }

    public function ExcluirCategoria($id){
        $cat = categoria::where("id", $id)->first();
        $cat->cat_ativo = 0;
        $cat->save();
    }

    public function BuscarAlteracao(){
        $categoria = Categoria::where("id", $id)->first();

        return view('categoria.alterar', compact("categoria"));
    }
}
