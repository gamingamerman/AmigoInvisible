<?php
namespace Dsw\Amigoinvisible\Controllers;

require_once('../src/connection.php');

use Dsw\Amigoinvisible\models\User;

class userController {

// Display a listing of the resource.
public function index() {
    //Obtener datos del modelo
    // $users = User::all();
    // echo "<h1>listado de usuarios</h1>";
    // foreach ($users as $user) {
    //     echo "<p>" . $user->name .  "</p>";
    // }
    $users = User::all();

    global $blade;
    echo $blade->view()->make('list', compact('users'))->render();
}

// Show the form for creating a new resource.
public function create() {
    global $blade;
    echo $blade->view()->make('create')->render();
}

// Store a newly created resource in storage.
public function store() {}

// Display the specified resource.
public function show($param) {
    $id = $param['id'];

    echo "id es ". $id;

    $user = User::find($id);
    if ($user) {
        global $blade;
        echo $blade->view()->make('show', compact('user'))->render();
    } else {
        echo "<h2>Usuario no encontrado</h2>";
    }
    
}

//Show the form for editing the specified resource.
public function edit($id) {}

//Update the specified resource in storage.
public function update($id) {}

//Remove the specified resource from storage.
public function destroy($id) {}

}
