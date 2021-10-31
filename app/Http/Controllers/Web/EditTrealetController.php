<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Output\ConsoleOutput;
use Vanguard\Http\Controllers\Controller;
use Vanguard\UserToTrealet;
use Vanguard\Trealets;
use Vanguard\User;

class EditTrealetController extends Controller
{


    public function index($id)
    {
        $trealet= Trealets::find($id);
        return view('trealets.edit-trealets', ['trealet'=>$trealet]);
    }
    public function update( Request $req, $id)
    {
        $output = new ConsoleOutput();


        $trealet= Trealets::find($id);
        $trealet-> title= $req->input('title');
        $trealet-> state= $req->input('state');
        $output->writeln($trealet-> published);
        $trealet-> published= $req->input('published');
        $trealet-> pass= $req->input('key');
        $trealet->save();
        return redirect(("/my-trealets"));

    }

}
