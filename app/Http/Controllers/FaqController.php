<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $data = Faq::orderBy('id', 'DESC');

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('question', 'like', '%'.$request->search.'%');

            return view('faqs.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('faqs.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create(FaqRequest $request)
    {
        Faq::create($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200); 
    }

    public function update($id, FaqRequest $request)
    {
        Faq::find($id)->update($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200); 
    }

    public function destroy(Request $request)
    {
        $data = Faq::find($request->id);

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
