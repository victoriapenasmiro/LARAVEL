<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;

/**
 * Este controlador administra tres rutas distintas.
 * Un método para cada una
 * 
 */
class CursoController extends Controller
{
    // si existe la función __invoke(), el controlador la busca por defecto, sin necesidad de llamarla

    //por convención la funcion de la página principal se llama index
    public function index()
    {
        $cursos = Curso::orderBy('id', 'DESC')->paginate();

        return view("cursos.index", compact('cursos'));
    }

    //por convención la funcion de la página de registro se llama create
    public function create()
    {
        return view("cursos.create");
    }

    public function store(StoreCurso $request)
    {
        // $request->validate([
        //     'name'=> 'required',
        //     'description' => 'required',
        //     'categoria' => 'required',
        // ]);

        // forma manual de guardar un recurso en ls db ****
        // $curso = new Curso();
        // $curso->name = $request->name;
        // $curso->description = $request->description;
        // $curso->categoria = $request->categoria;
        // $curso->save();

        // asignación masiva para guardar un recurso en la db
        $curso = Curso::create($request->all());

        return redirect()->route('cursos.show', $curso->id);
        //si omitimos ->id, Laravel entiende que debe acceder al id del obj
        //para imprimir la request, los datos que viajan por parámetros
    }

    //por convención la funcion mostrará resultados se llama show
    // public function show($curso)
    // {
    //     return view("cursos.show", ["curso" => $curso]);
    // }

    //si recibiera por parámetro otra categoria --ejemplo de como poner
    public function show2($id, $categoria = null)
    {
        /* cuando la key se puede llamar igual que la variable
            en vez de enviar el parámetro en este formato ["curso" => $curso]
            se podría enviar como compact("curso");
        */

        $curso = Curso::find($id);

        if ($categoria) {
            return view("cursos.show", ["curso" => $curso, "categoria" => $categoria]);
            //return "Bienvenido al curso: $curso de la categoria: $categoria";
        } else {
            return view("cursos.show", compact("curso"));
        }
    }

    public function show(Curso $curso, $categoria = null)
    {
        return view("cursos.show", compact("curso"));
    }

    /**
     * Por parámetro indico que recibirá un obj de tipo Curso son un id concreto
     */
    public function edit(Curso $curso)
    {
        // lo siguiente sería necesario si por parametro no especificamos que el tipo de dato que
        // se va a recibir es una instancia de tipo Curso, y el parametro es $id
        // $curso = Curso::find($id);
        // return $curso;

        return view('cursos.edit', compact("curso"));
    }

    public function update(Request $request, Curso $curso){

        // $request->validate([
        //     'name'=> 'required',
        //     'description' => 'required',
        //     'categoria' => 'required',
        // ]);

        // $curso->name = $request->name;
        // $curso->description = $request->description;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        //actualización por asignación masiva
        $curso->update($request->all());

        return redirect()->route('cursos.show', $curso->id);
    }

    public function destroy(Curso $curso){
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
