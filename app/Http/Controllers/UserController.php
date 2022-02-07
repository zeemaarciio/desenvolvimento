<?php

namespace DevImobiliaria\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index()
    {
        return "<h1> Listagem do user de código 1</h1>";
    }

    public function getData()
    {
        return "<h1>Disparou a ação de GET</h1>";
    }

    public function postData(Request $request)
    {
        var_dump($request);
        return "<h1>Disparou a ação de POST</h1>";
    }

    public function testePut(Request $request)
    {
        echo "<h1>Usuario PUT de código 1</h1>";
        var_dump($request);
        return "<h1>Disparou a ação de PUT</h1>";
    }

    public function testePatch(Request $request)
    {
        echo "<h1>Usuario PATCH de código 1</h1>";
        var_dump($request);
        return "<h1>Disparou a ação de PATCH</h1>";
    }

    public function testeMatch(Request $request)
    {
        echo "<h1>Usuario MATCH de código 2</h1>";
        var_dump($request);
        return "<h1>Disparou a ação de MATCH</h1>";
    }

    public function destroy(Request $request)
    {
        echo "<h1>Usuario Código 1 DELETADO</h1>";
        var_dump($request);
        return "<h1>Disparou a ação de Delete</h1>";
    }

    public function any(Request $request)
    {
        var_dump($request);
        return "<h1>Qualquer vergo é aceito</h1>";
    }

    public function userComments($id, $comment = null)
    {
        echo "Controller: User Método: userComments";
        var_dump($id, $comment);
    }

    public function inspect()
    {
        $route = Route::current();
        $name = Route::currentRouteName();
        $action = Route::currentRouteAction();

    var_dump($route, $name, $action);
    }

}
