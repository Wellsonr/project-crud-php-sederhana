<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Items extends BaseController
{
    protected ItemModel $model;

    public function __construct()
    {
        $this->model = new ItemModel();
    }

    public function index()
    {
        return view('items/index', ['items' => $this->model->findAll()]);
    }

    public function create()
    {
        return view('items/form', ['item' => null]);
    }

    public function store()
    {
        if (! $this->model->save($this->request->getPost(['name', 'description', 'price']))) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/items')->with('message', 'Item created.');
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        if (! $item) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('items/form', ['item' => $item]);
    }

    public function update($id)
    {
        if (! $this->model->update($id, $this->request->getPost(['name', 'description', 'price']))) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/items')->with('message', 'Item updated.');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('/items')->with('message', 'Item deleted.');
    }
}
