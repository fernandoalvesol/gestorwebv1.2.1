<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cobranca;
use App\Http\Requests\Painel\CobrancaFormRequest;

class CobrancaController extends Controller {

    private $cobranca, $totalPage = 15;
    private $request;

    public function __construct(Cobranca $cobranca, Request $request) {

        $this->cobranca = $cobranca;
        $this->request = $request;
    }

    public function index() {

        $title = "Pagina de Cobrança";

        $cobranca = $this->cobranca->paginate($this->totalPage);

        return view('Painel.Cobranca.index', compact('title', 'cobranca'));
    }

    public function create() {

        $title = "Lançar Cobrança";

        return view('Painel.Cobranca.create-edit', compact('title'));
    }

    public function store(CobrancaFormRequest $request) {

        $dataCobranca = $request->all();

        $insert = $this->cobranca->create($dataCobranca);

        if ($insert)
            return redirect()
                            ->route('cobranca.index')
                            ->with(['sucess' => 'Cadastro realizado com sucesso']);
        else
            return redirect()
                            ->route('cobranca.index')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }

    public function show($id) {

        $title = "Exibir Lançamento";

        $cobranca = $this->cobranca->find($id);

        return view('Painel.Cobranca.show', compact('title', 'cobranca'));
    }

    public function edit($id) {

        $title = "Editar Lançamento";

        $cobranca = $this->cobranca->find($id);

        return view('Painel.Cobranca.create-edit', compact('title', 'cobranca'));
    }

    public function update(CobrancaFormRequest $request, $id) {

        $dataCobranca = $request->all();

        $cobranca = $this->cobranca->find($id);

        $update = $cobranca->update($dataCobranca);


        if ($update)
            return redirect()
                            ->route('cobranca.index')
                            ->with(['sucess' => 'Cadastro realizado com sucesso']);
        else
            return redirect()
                            ->route('cobranca.index')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }

    public function destroy($id) {

        $cobranca = $this->cobranca->find($id);

        $delete = $cobranca->delete();


        if ($delete) {

            return redirect()
                            ->route('cobranca.index')
                            ->with(['sucess' => 'Setor Excluido com sucesso']);
        } else {
            return redirect()
                            ->route('cobranca.index', ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }

    public function search(Request $request) {

        $dataForm = $request->except('_token');

        $cobranca = $this->cobranca
                ->where('associado', 'LIKE', "%{$dataForm['key-search']}%")
                ->orWhere('data', $dataForm['key-search'])
                ->orWhere('placa', $dataForm['key-search'])
                ->orWhere('status', $dataForm['key-search'])
                ->paginate($this->totalPage);

        return view('Painel.Cobranca.index', compact('cobranca', 'dataForm'));
    }

}
