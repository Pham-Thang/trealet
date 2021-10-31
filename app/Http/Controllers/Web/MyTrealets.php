<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Trealets;
use Vanguard\User;
use Vanguard\UserToTrealet;
use Vanguard\Groups;

class MyTrealets extends Controller
{
    public function __construct()
    {
        // Allow access to authenticated users only.
        $this->middleware('auth');
    }

    public function index()
    {


        $trs = Trealets::select()
            ->where('user_id', auth()->id())
            ->get();
        return view('trealets.my-trealets', compact('trs')  );
    }
    public function destroy_trealet($id) {
        $trealet= Trealets::find($id);
        $trealet->active = 1;
        $trealet -> save();
        $gr = Groups::select()->where('trealet_id',$id)->get();
        foreach ($gr as $value) {
            $value->delete();
        };

        return redirect()->back()->withSuccess('Bạn đã xóa trealet thành công !' ) ;

    }
    public function duplicate_trealet($id) {
        $sign = " (copy)";
        $trealet = Trealets::find($id);
        $new_trealet = $trealet ->replicate();
        $new_trealet ->title = $new_trealet ->title .$sign;
        $new_trealet ->save();
        return redirect()->back()->withSuccess('Bạn đã copy trealet thành công !' ) ;




    }

    public function publish_trealet($id) {
        $trealet= Trealets::find($id);

        if($trealet->published == 0){
            $trealet->published = 1;
            $trealet ->save();
            return redirect()->back()->withSuccess('Bạn đã publish trealet thành công !' ) ;
        }
        else{
            $trealet->published = 0;
            $trealet ->save();
            return redirect()->back()->withSuccess('Bạn đã unpublish trealet thành công !' ) ;
        }


    }

    /**
     * @return array
     */
    public function getTrs_group(): array
    {
        $gr = Groups::select('trealet_id', 'role')->where('member_id', auth()->id())->groupBy(['trealet_id'])->get();

        $trs_group = array();
        $output = new ConsoleOutput();
        foreach ($gr as $value) {
            $output->writeln($value);
            $trs_group_item = Trealets::select()
                ->where('id', $value['trealet_id'])
                ->first();
            $output->writeln($value['role']);

            $trs_group_item->role = $value['role'];
            if ($value['role']) {
                array_push($trs_group, $trs_group_item);
            }
        };
        return $trs_group;
    }


}
