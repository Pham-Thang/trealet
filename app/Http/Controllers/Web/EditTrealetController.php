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
        //Fetch trealet info
        $tr = Trealets::where('id','=',$id)->first();

        //Fetch the info of trealet's creator
        $creator = User::where('id','=',$tr['user_id'])->first();

        if(!$tr) return 'Cannot find the trealet';

        //Get current user info (if authenticated)
        $user = NULL;
        if(auth()->id()) $user = User::where('id','=',auth()->id())->first();

        //Fetch score info


        $d = $this->parseTrealetJSON($tr->json,'streamline');

        if(is_string($d)) return $d;	//A string return means parse error

        $ni = sizeof($d['items']);
        $iu = array($ni);
        $items = [];
        for($i=0;$i<$ni;$i++)
        {
            $itemid = $d['items'][$i];
            $items[$i] = $this->fetchItemData($itemid);
        }
        $name = $tr->title;
        $id = $tr->id;
        $desc = $d['desc'];
        return view('trealets.edit-trealets', compact('user','tr', 'id', 'd','items','creator', 'name', 'desc'));
    }

    function fetchItemData($item_url)
    {
        if(is_numeric($item_url))
        {
            $item_url = 'https://hcloud.trealet.com/tiny'.$item_url.'/?json';
            $json_string = file_get_contents($item_url);
            if(!$json_string) return;
            $d = json_decode($json_string, true);
            return $d['image'];
        }
        else
        {
            return $item_url;
        }
    }
    function parseTrealetJSON($json_string,$exec)
    {
        $d = json_decode($json_string, true);
        if(!$d) die('Cannot parse the trealet content!');
        if(!isset($d['trealet'])) die('It is not a trealet!');
        if($d['trealet']['exec']!=$exec) die('Wrong executable name!');
        return $d['trealet'];
    }
    public function update( Request $req, $id)
    {

        $trealet= Trealets::find($id);
        $trealet-> title= $req->input('title');
        $trealet-> state= $req->input('state');

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

    public  function edit_trealet(Request $request){
        $output = new ConsoleOutput();
        $output->writeln($request->get("id"));
        $output->writeln($request->get("mode"));
        $output->writeln($request->get("key"));
        $tr= Trealets::find($request->get("id"));
        $output->writeln($tr);
        $tr->type = $request -> get("type");
        $tr->title = $request -> get("title");
        $tr->json = $request -> get("json");
        $tr->pass = $request -> get("key");
        $tr->save();
        $output->writeln(123);
    }

}
