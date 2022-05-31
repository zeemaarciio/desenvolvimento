<?php

namespace DevImobiliaria\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DevImobiliaria\Http\Controllers\Controller;
use DevImobiliaria\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::check() === true) {
            return redirect()->route('admin.home');
        }
        return view('admin.index');
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    /*public function login(Request $request)
    {
        if (in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, informe um e-mail válido')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, usuário e senha não conferem')->render();
            return response()->json($json);
        }

        $this->authenticated($request->getClientIp());
        var_dump('caiu aqui', $credentials);
        var_dump($this->authenticated($request->getClientIp()));
        exit;
        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }*/

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        dd(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]));

        if(!Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect()->back()->with(['fail'=>'Could Not Log You In']);
        }

        return redirect()->route('admin.home');

    }

    // public function login(Request $request)
    // {

    //     /*if(in_array('', $request->only('email', 'password'))) {
    //         $json['message'] = $this->message->error('informe os dados corretamente')->render();
    //         return response()->json($json);
    //     }*/

    //     if(in_array('', $request->only('email', 'password'))) {
    //         echo json_encode($msg = array("message" => $this->message->error('Informe os dados corretamente')->render(), "status" => false));
    //     } //else {
    //         //echo json_encode($status = array("message" => "Contato enviado com sucesso!", "status" => true));
    //     //}

    //     if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
    //         echo json_encode($msg = array("message" => $this->message->error('Digite o E-mail corretamente!')->render(), "status" => false));
    //     }

    //     $credentials = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     if(!Auth::attempt($credentials)) {
    //         echo json_encode($msg = array("message" => $this->message->error('Ops!! E-mail/Senha Incorretos!')->render(), "status" => false));
    //     }

    //     $this->authenticated($request->getClientIp());
    //     echo json_encode($msg = array("redirect" => route('admin.home')));
    //     //return redirect()->route('admin.home');


    //     /*if(in_array('', $request->only('email', 'password'))) {
    //         echo json_encode($msg = array("msg" => "Preencha corretamente todos os campos!", "status" => false));
    //     } else {
    //         echo json_encode($status = array("msg" => "Contato enviado com sucesso!", "status" => true));
    //     }*/
        
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
