<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests\UsersCreateRequest;
use Ramsey\Uuid\Uuid;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pluck substitui lists em versões mais avançadas do Laravel como esta

        $roles = Role::pluck('name', 'id')->all();;



        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {

        $input = $request->all();

        //Aqui estamos a adicionar uma foto ao utilizador e a adiciona-la 
        //Na tabela photos
        //Se o formulario que preenchemos tiver uma foto entra neste if


        if($file = $request-> file('photo_id')) {

            //A foto tera o nome da data actual + o nome do ficheiro
            $uuid4 = Uuid::uuid4();     
            $ext = $file->getClientOriginalExtension();
            $name = $uuid4->toString() . '.' . $ext;

            //Ficheiro vai ser mexido para uma pasta chamada images no public
            //Caso esta não exista é criada

            $file->move('images',$name);

            //Aqui cria a foto propriamente dita no model photo que vai entrar na base de dados

            $photo = Photo::create(['file'=>$name]);

            //Associamos o photo_id ao id da propria foto

            $input['photo_id'] = $photo->id;

        }

        //Aqui estamos a encriptar a password

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('admin.users.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
