<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Console\Output\ConsoleOutput;
use Vanguard\Http\Controllers\Controller;
use Vanguard\UserToTrealet;
use Vanguard\Trealets;
use Vanguard\User;
use function MongoDB\BSON\toJSON;

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

        return redirect(("/my-trealets"))->withSuccess('Đã lưu thông tin update !!!' );

    }
    public  function upload_new_trealet(Request $request){
        $tr = new Trealets();
        $tr->user_id = auth()->id();
        $tr->type = $request -> get("type");
        $tr->title = $request -> get("title");
        $tr->json = $request -> get("json");
        $tr->save();
        return redirect(("/my-trealets"))->withSuccess('Tạo trealet thành công !!!' );
    }

}
