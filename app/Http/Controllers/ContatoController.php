<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Symfony\Component\Config\Definition\Exception\Exception;
use App\Models as Model;

class ContatoController extends Controller {

    public function select($id) {
        try {
            if (isset($id)) {
                $contato = Model\Contatos::where('id_contato', array($id))->get()->toArray();
                if (count($contato) == 0) {
                    abort('404');
                } else {
                    return response()->json($contato);
                }
            } else {
                abort('404');
            }
        } catch (Exception $e) {
            abort('404');
        }
    }

    public function insert(Request $request) {
        try {
            $data = $request->all();
            if (isset($data['nome'])) {
                $insertContato = New Model\Contatos();
                $insertContato->nome = $data['nome'];
                $insertContato->telefone = $data['telefone'];
                $insertContato->email = $data['email'];
                $insertContato->descricao = $data['descricao'];
                
                $statusContato = $insertContato->save();
                
                if ($statusContato) {
                    $json['id'] = DB::getPdo()->lastInsertId();
                    return response()->json($json, 201);
                } else {
                    abort('404');
                }
            } else {
                abort('404');
            }
        } catch (Exception $e) {
            abort('404');
        }
    }
    
    public function update(Request $request, $id) {
        try {
            $data = $request->all();
            
            if (isset($id) && is_numeric($id) && $id > 0) {
                $updateContato = New Model\Contatos();
                if (isset($data['nome'])) {
                    $updateCampos['nome'] = $data['nome'];
                }
                if (isset($data['telefone'])) {
                    $updateCampos['telefone'] = $data['telefone'];
                }
                if (isset($data['email'])) {
                    $updateCampos['email'] = $data['email'];
                }
                if (isset($data['descricao'])) {
                    $updateCampos['descricao'] = $data['descricao'];
                }
                
                $updateContato->id_contato = $id;
                $statusContato = $updateContato->where('id_contato', $id)->update($updateCampos);

                if ($statusContato) {
                    $json['id'] = $id;
                    return response()->json($json, 201);
                } else {
                    abort('404');
                }
            } else {
                abort('404');
            }
        } catch (Exception $e) {
            abort('404');
        }
    }
    
    public function delete($id) {
        try {
            if (isset($id)) {
                $validaContato = Model\Contatos::where('id_contato', array($id))->get()->toArray();
                if (count($validaContato) == 0) {
                    abort('404');
                } else {
                    $idContato = $validaContato[0]['id_contato'];
                    $deleteContato = New Model\Contatos();
                    $deleteContato->id_contato = $idContato;

                    $statusContato = $deleteContato->destroy($idContato);

                    if ($statusContato) {
                        $json['id'] = $id;
                        return response()->json($json, 200);
                    } else {
                        abort('404');
                    }
                }
            } else {
                abort('404');
            }
        } catch (Exception $e) {
            abort('404');
        }
    }

}
