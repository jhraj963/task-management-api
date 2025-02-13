<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return Organization::all();
    }

    public function store(Request $request)
    {
        $organization = Organization::create($request->all());
        return response()->json($organization, 201);
    }

    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());
        return response()->json($organization);
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return response()->json(null, 204);
    }
}
