<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Http\Requests\{FormsRequest};
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class FormController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = Form::orderBy('id', 'DESC');

            if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
                $data->where('title', 'like', '%' . $request->search . '%');

                return view('forms.list', [
                    'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
                ])->render();
            }
        } catch (\Throwable $th) {
            //throw $th;
            error_log('awef gefe gefawefa e: ' . $th);
        }

        return view('forms.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function files(Request $request)
    {
        $data = Form::where(['user_id' => auth()->user()->id])->orderBy('id', 'DESC');

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('title', 'like', '%' . $request->search . '%');

            return view('forms.file-list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.files', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function duplicate($id)
    {
        $form = Form::find($id);

        $data = Form::create([
            'readonly' => false,
            'user_id' => auth()->user()->id,
            'title' => $form->title . ' (Draft)',
            'html' => $form->html,
        ]);

        return redirect(route('forms.edit', $data->id));
    }

    public function show($id)
    {
        $data = Form::find($id);

        return view('forms.show', [
            'data' => $data,
        ]);
    }

    public function create(Request $request)
    {
        if (!empty($request->with_header)) {
            if ($form = Form::create([
                'title' => 'Draft - ' . Carbon::now(),
                'readonly' => true, 'user_id' => auth()->user()->id,
                'html' => Form::find(2)->html ?? '',
            ])) {
                return redirect(route('forms.edit', $form->id));
            }
        }

        return view('forms.create');
    }

    public function store(FormsRequest $request)
    {
        Form::create($request->all() + ['readonly' => true, 'user_id' => auth()->user()->id]);

        return response()->json([
            'redirect_url' => auth()->user()->role->slug === 'student' ? redirect(route('forms.files.list'))->getTargetUrl() : redirect(route('forms.list'))->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    // public function edit($id, Request $request)
    // {
    //     $data = Form::find($id);

    //     if (!empty($request->download) && $request->download === 'true') {

    //         $pdf = App::make('dompdf.wrapper');
    //         $pdf->loadHTML($data->html);

    //         return $pdf->download('form-' . Carbon::now() . '.pdf');
    //     }

    //     if (!empty($request->raw_html) && $request->raw_html === 'true') {
    //         return $data->html;
    //     }

    //     return view('forms.edit', [
    //         'data' => $data
    //     ]);
    // }

    // public function update($id, FormsRequest $request)
    // {
    //     Form::find($id)->update($request->all());

    //     return response()->json([
    //         'dont_show_alert' => true,
    //         'message' => 'Updated Successfully.',
    //         'success' => true,
    //     ], 200);
    // }

    public function destroy(Request $request)
    {
        $data = Form::find($request->id);

        if ($data && $data->delete()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Successfully Deleted',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Theres an error deleting this item.',
            'success' => true,
        ], 200);
    }
}
