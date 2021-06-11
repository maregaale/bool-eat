<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlateController extends Controller
{

    protected $validation = [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ci importiamo tutti i piatti
        //$plates = Plate::all();

        //salviamo in una variabile lo user autenticato
        $user_id = Auth::id();
        //associamo a questa variabile i piatti che sono associati a quello User
        $plates = Plate::where('user_id', $user_id)->get();

        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $genres = Genre::all();
        return view('admin.plates.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $validation = $this->validation;

        $request->validate($validation);

        $data = $request->all();

        // salvataggio dati booleani
        $data['visible'] = !isset($data['visible']) ? 0 : 1;
        $data['vegan'] = !isset($data['vegan']) ? 0 : 1;
        $data['vegetarian'] = !isset($data['vegetarian']) ? 0 : 1;
        $data['gluten_free'] = !isset($data['gluten_free']) ? 0 : 1;
        $data['hot'] = !isset($data['hot']) ? 0 : 1;
        // slug nome piatto
        $data['slug'] = Str::slug($data['name'], '-');

        // upload file image
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('image', $data['image']);
        }

        // richiamo lo user tramite id
        $data['user_id'] = Auth::id();

        // salvo il nuovo piatto a db
        $newPlate = Plate::create($data);

        // reinvio alla index
        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
