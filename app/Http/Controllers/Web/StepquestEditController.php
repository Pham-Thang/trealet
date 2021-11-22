<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Album;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Image;
use Vanguard\Trealets;

class StepquestEditController extends Controller
{
    public function index()
    {
        $albums = $this->getAlbum();

        return view('trealets.my-stepquest', compact('albums'));
    }

    public function getAlbum()
    {
        return Album::all()->map(function ($item) {
            $folders = explode('/', $item->folder);

            return [
                'id' => $item->id,
                'title' => str_replace('-', ' ', $folders[count($folders) - 1]),
            ];
        });
    }

    public function ungdung(Request $request)
    {
        $donvi = $request->get('donVi', 1);

        return Album::where('parentid', $donvi)->get()->map(function ($album) {
            $folders = explode('/', $album->folder);

            return [
                'id' => $album->id,
                'title' => str_replace('-', ' ', $folders[count($folders) - 1]),
            ];
        })->toJson();
    }

    public function treeFolder()
    {
        $albums = Album::all()->map(function ($album) {
            $folders = explode('/', $album->folder);

            return [
                'id' => $album->id,
                'path' => str_replace('-', ' ', $folders[count($folders) - 1]),
                'folder' => [],
                'parentid' => $album->parentid ?? null
            ];
        })->toArray();

        echo json_encode($this->parseTree($albums, $albums[0]));
    }

    private function parseTree($tree, $root = null)
    {
        $return = [];
        foreach ($tree as $child => $parent) {
            if ($parent['parentid'] == $root['id']) {
                unset($tree[$child]);
                $return[] = array(
                    'id' => $parent['id'],
                    'text' => '<span class="parentId" data-id= ' . $parent['id'] . '>' . $parent['path'] . '</span>',
                    'nodes' => $this->parseTree($tree, $parent)
                );
            } else {
                $return[] = array(
                    'id' => $parent['id'],
                    'text' => '<span class="parentId" data-id= ' . $parent['id'] . '>' . $parent['path'] . '</span>',
                    'nodes' => []
                );
            }
        }
        return empty($return) ? null : $return;
    }

    public function image(Request $request)
    {
        $donvi = $request->get('donVi', 1);

        return Image::where('albumid', $donvi)->get()->map(function ($image) {
            return [
                'id' => $image->id,
                'title' => $image->filename,
            ];
        })->toJson();
    }

    public function upload(Request $request)
    {
        $main = array_reduce($request->get('main'), function ($stepInit, $e) {
            $stepInit[$e['name']] = $e['value'];
            return $stepInit;
        }, []);

        $stepQuest = ['trealet' => array_merge($main, ['items' => $request->get('items')])];

        Trealets::create([
            'json' => json_encode($stepQuest, JSON_UNESCAPED_UNICODE),
            'user_id' => auth()->id(),
            'title' => $main['title'],
            'type' => Trealets::STEPQUEST_TYPE,
            'state' => 1
        ]);

        return route('my-trealets');
    }
}
