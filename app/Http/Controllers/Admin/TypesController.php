<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TypeRequest;
use App\Interview;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypesController extends Controller
{

    /**
     * Manage types
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all categories leveled
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Create new type
     * @param TypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TypeRequest $request)
    {
        // create new term
        Type::create($request->all());
        return redirect()->back()->with(['message' => 'Type is successfully created!', 'type' => 'success']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get term by id
        $type = Type::find($id);
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Show type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $type = Type::find($id);
        return view('front.interviews.show', compact('type'));
    }

    /**
     * Update type
     * @param TypeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TypeRequest $request, $id)
    {
        Type::find($id)->update($request->all());
        return redirect('admin/types')->with(['message' => 'The type has been updated.', 'type' => 'success']);
    }

    /**
     * Delete type
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Type::find($id)->delete();
        return redirect()->back()->with(['message' => 'Type has been deleted.', 'type' => 'success']);
    }
}
