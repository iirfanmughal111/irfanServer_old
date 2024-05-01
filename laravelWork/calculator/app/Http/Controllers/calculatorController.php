<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class calculatorController extends Controller
{
    public function view(){
        return view('index',['res'=>'values not submitted yet']);
    }
    public function action(request $req){
        $n1 = $req->input('n1');
        $n2 = $req->input('n2');
        $req->validate([
            'op'=>'required',

        ]);
        $op = $req->input('op');
        switch($op){
            case '+':
                $res = $n1+$n2;
                break;
                case '-':
                    $res = $n1-$n2;
                    break;
                    case '*':
                        $res = $n1*$n2;
                        break;
                        case '/':
                            if ($n1==0){
                                $res='undefined';
                            }else if ($n2==0){
                                $res='infinity';
                            }
                            else{
                            $res = $n1/$n2;
                        }
                            break;
                            case '%':
                                if ($n1<$n2){
                                    $res= $n1;
                                }
                                else{
                                    $res = $n1%$n2;
                                }
                                
                                break;
                                 default:
                                    $res = 'Please select an operation';
                                    break;

        }
     
        return view('index',['res'=>$res]);
    }
}
