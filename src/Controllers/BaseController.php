<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as LaravelController;
use Illuminate\Support\Str;

class BaseController extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $prefix = '';
    protected $data = [];
    protected $model;
    protected $query;

    public function __construct()
    {
        $model_name = (new \ReflectionClass($this->model))->getShortName();
        $this->prefix = $this->prefix ?: Str::plural(strtolower($model_name));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['records'] = $this->query->paginate($request->per_page);
        $this->data['columns'] = $this->tableFields();
        return view($this->prefix . '.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->prefix . '.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->createRules(), $this->createMessages());
        $this->model->create($request->all());
        return redirect(route($this->prefix . '.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['record'] = $this->model->findOrFail($id);
        return view($this->prefix . '.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['record'] = $this->model->findOrFail($id);
        return view($this->prefix . '.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->updateRules(), $this->updateMessages());
        $record = $this->model->findOrFail($id);
        $record->update($request->all());
        return redirect(route($this->prefix . '.show'), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();
        return redirect(route($this->prefix . '.index'), $id);
    }

    protected function createRules()
    {
        return [];
    }

    protected function updateMessages()
    {
        return [];
    }

    protected function updateRules()
    {
        return [];
    }

    protected function createMessages()
    {
        return [];
    }

    protected function tableFields()
    {
        if ($this->data['records'] && count($this->data['records']) > 0) {
            return array_keys(head($this->data['records']));
        }
        return [];
    }
}
