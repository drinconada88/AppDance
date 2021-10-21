<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\BaseController  as BaseController;
use App\Models\Nightclub;

use App\Http\Resources\NightclubResource;
use \Validator;

class NightclubController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $nightclub = Nightclub::all();

        return $this->sendResponse(NightclubResource::collection($nightclub), 'Clubs retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource. Not needed for app only.
     *
     * @return void
     */
    public function create()
    {
        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $nightclub)
    {
        $input = $nightclub->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'salsa' => 'required',
            'bachata' => 'required',
            'kizomba' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $nightclub = Nightclub::create($input);

        return $this->sendResponse(new NightclubResource($nightclub), 'Club created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Nightclub  $nightclub
     * @return JsonResponse
     */
    public function show(Nightclub $nightclub)
    {

        if (is_null($nightclub)) {
            return $this->sendError('Club not found.');
        }

        return $this->sendResponse(new NightclubResource($nightclub), 'Club retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Nightclub  $nightclub
     * @return JsonResponse
     */
    public function update(Request $request, Nightclub $nightclub)
    {
        $input = $request->all();

        $nightclub->fill($input);
        $nightclub->save();

        return $this->sendResponse(new NightclubResource($nightclub), 'Club updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Nightclub  $nightclub
     * @return JsonResponse
     */
    public function destroy(Nightclub $nightclub)
    {
        $nightclub->delete();

        return $this->sendResponse(new NightclubResource($nightclub), 'Product deleted successfully.');
    }
}
