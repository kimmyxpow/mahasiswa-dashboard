<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mahasiswa;

use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table mahasiswa
        $mahasiswa = Mahasiswa::selectRaw('*, CONCAT_WS(", ", tempat_lahir, tgl_lahir) AS ttl, (CASE WHEN jk=1 THEN "Laki-laki" WHEN jk=2 THEN "Perempuan" ELSE "Banci" END) as jk')
            ->latest()
            ->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Mahasiswa',
            'data'    => $mahasiswa
        ], 200);

    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();

        //success save to database
        if($mahasiswa) {
            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa Created',
                'data'    => $mahasiswa
            ], 201);

        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Mahasiswa Failed to Save',
        ], 409);

    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        //find mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Edit Data Mahasiwa',
            'data'    => $mahasiswa
        ], 200);

    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        if($mahasiswa) {

            //update mahasiswa
            $mahasiswa->nama = $request->nama;
            $mahasiswa->tempat_lahir = $request->tempat_lahir;
            $mahasiswa->tgl_lahir = $request->tgl_lahir;
            $mahasiswa->jk = $request->jk;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->save();

            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa Updated',
                'data'    => $mahasiswa
            ], 200);

        }

        //data mahasiswa not found
        return response()->json([
            'success' => false,
            'message' => 'Mahasiswa Not Found',
        ], 404);

    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find mahasiswa by ID
        $mahasiswa = Mahasiswa::findOrfail($id);

        if($mahasiswa) {

            //delete mahasiswa
            $mahasiswa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Mahasiswa Deleted',
            ], 200);

        }

        //data mahasiswa not found
        return response()->json([
            'success' => false,
            'message' => 'Mahasiswa Not Found',
        ], 404);
    }
}
