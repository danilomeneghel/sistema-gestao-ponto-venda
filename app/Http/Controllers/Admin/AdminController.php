<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transacoes;
use App\Models\Estoque\Estoque_aux;

class AdminController extends Controller
{
    public function index(){
        $clientes = Cliente::all();
        $estoque = Estoque_aux::Total();
        $transacoes = count(Transacoes::month());
        $faturamento = 'R$'.$this->GetCardFaturamento(date('Y'));
        $vendas = $this->GetRelatorioVendas(date('Y'));
        return view('admin.home.index',['clientes'=>$clientes,'estoque'=>$estoque,'transacoes'=>$transacoes,
        'faturamento'=>$faturamento,'datasets'=>$vendas]);
    }

    function GetCardFaturamento($year){
        $Faturamento = Transacoes::Faturamento($year);
        return number_format($Faturamento,2,',','.');
    }

    function GetRelatorioVendas($year){
            $date = strtotime('01/01/'.$year);
            $transacoes = Transacoes::whereYear('data','=', date('Y',$date))->get(['id','created_at']);
            $month = array();
            foreach($transacoes as $tr){
                $time = strtotime($tr->created_at);
                $newformat = date("M",$time);
                if(!in_array($newformat,$month)){
                    array_push($month, $newformat);
                }
            }

            $monthRelatorio = array();
            foreach($month as $m){
                $date = strtotime('01 '. $m.' '.$year);
                $newformat = date('m-Y',$date);
                $totalMonth = Transacoes::whereMonth('data','=',  date('m',$date))->
                whereYear('data','=',  date('Y',$date))->sum('total');

                $vendas = number_format($totalMonth,2,',','.');
                array_push($monthRelatorio,(float)$totalMonth);
            }
            $dataset = new \StdClass;
            $relatorioAno = new \StdClass;
            $dataset->labels = $month;
            $relatorioAno->label = "Vendas";
            $relatorioAno->backgroundColor = 'rgba(255, 99, 132, 0.2)';
            $relatorioAno->borderColor= 'rgba(255,99,132,1)';
            $relatorioAno->borderWidth =  1;
            $relatorioAno->data = $monthRelatorio;
            $dataset->datasets = array($relatorioAno);
            return JSON_ENCODE((array)$dataset);
        }
}
