<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Renovar;
use App\Http\Requests\Painel\RenovarFormRequest;

class RenovarController extends Controller
{
    private $renovar, $totalPage = 15;
    private $request;


    public function __construct(Renovar $renovar, Request $request){

        $this->renovar = $renovar;
        $this->request = $request;

    }

    public function index(){

        $title = "Pagina de Renovação";
        
        $renovar = $this->renovar->paginate($this->totalPage);

        return view('Painel.Renovacao.index', compact('title', 'renovar'));

    }
    
    public function create(){
        
        $title = "Lançar Renovação";
        
        return view('Painel.Renovacao.create-edit', compact('title'));
        
    }
    
    public function store(RenovarFormRequest $request) {

        $dataRenovar = $request->all();

        $insert = $this->renovar->create($dataRenovar);

        if ($insert)
            return redirect()
                            ->route('renovar.index')
                            ->with(['sucess' => 'Cadastro realizado com sucesso']);
        else
            return redirect()
                            ->route('renovar.index')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }
    
    
    public function show($id) {

        $title = "Exibir Lançamento";

        $renovar = $this->renovar->find($id);

        return view('Painel.Renovacao.show', compact('title', 'renovar'));
    }
    
    
    public function edit($id) {

        $title = "Editar Lançamento";

        $renovar = $this->renovar->find($id);

        return view('Painel.Renovacao.create-edit', compact('title', 'renovar'));
    }
    
    public function update(RenovarFormRequest $request, $id) {

        $dataRenovar = $request->all();

        $renovar = $this->renovar->find($id);

        $update = $renovar->update($dataRenovar);


        if ($update)
            return redirect()
                            ->route('renovar.index')
                            ->with(['sucess' => 'Alteração realizado com sucesso']);
        else
            return redirect()
                            ->route('renovar.index')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }
    
    
    public function destroy($id) {

        $renovar = $this->renovar->find($id);

        $delete = $renovar->delete();


        if ($delete) {

            return redirect()
                            ->route('renovar.index')
                            ->with(['sucess' => 'Lançamento Excluido com sucesso']);
        } else {
            return redirect()
                            ->route('renovar.index', ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }
    
    
     public function search(Request $request) {

        $dataForm = $request->except('_token');

        $renovar = $this->renovar
                ->where('associado', 'LIKE', "%{$dataForm['key-search']}%")
                ->orWhere('data', $dataForm['key-search'])                        
                ->orWhere('placa', $dataForm['key-search'])
                ->orWhere('status', $dataForm['key-search'])
                ->paginate($this->totalPage);

        return view('Painel.Renovacao.index', compact('renovar', 'dataForm'));
    }
}
