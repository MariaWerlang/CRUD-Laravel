<?php

namespace App\Http\Controllers;
use App\Models\Servicos;
use Illuminate\Http\Request;

class ServicosController extends Controller
{

    /*index*/
    public function index(){
        return view('index');
    }
    
    /*LConsulta os dados que se encontram nno banco de dados*/
    public function consultar(){
        $data = Servicos::get();
        //return $data;
        return view('consultar', compact('data'));
    }

    /*Função que salva os dados insridos nos campos aprensetados*/
    public function salvar(Request $request){

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'origem' => 'required',
            'datacont' => 'required',
            'obs' => 'required',
        ]);

        $nome = $request->nome;
        $telefone = $request->telefone;
        $origem = $request->origem;
        $datacont = $request->datacont;
        $obs = $request->obs;

        $ser = new Servicos();
        $ser->nome = $nome;
        $ser->telefone = $telefone;
        $ser->origem = $origem;
        $ser->datacont = $datacont;
        $ser->obs = $obs;
        $ser->save();

        return redirect()->back()->with('sucesso', 'Serviço cadastrado com sucesso!');
        
    }

    /*Responsavel pela a view editar*/
    public function editar($id){
        $data = Servicos::where('id', '=', $id)->first();
        return view('editar', compact('data'));

    }

    /*Função de editar e atualizar*/
    public function atualizar(Request $request){
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'origem' => 'required',
            'datacont' => 'required',
            'obs' => 'required',
        ]);

    
        $id = $request->id;
        $nome = $request->nome;
        $telefone = $request->telefone;
        $origem = $request->origem;
        $datacont = $request->datacont;
        $obs = $request->obs;

        Servicos::where('id', '=', $id)->update([
            'nome'=>$nome,
            'telefone'=>$telefone,
            'origem'=>$origem,
            'datacont'=>$datacont,
            'obs'=>$obs,
        ]);

        return redirect()->back()->with('sucesso', 'Serviço atualizado com sucesso!');
    }

    /*função de excluir*/
    public function excluir($id){
        Servicos::where('id', '=', $id)->delete();
        return redirect()->back()->with('sucesso', 'Serviço excluído com sucesso!');
    }

}