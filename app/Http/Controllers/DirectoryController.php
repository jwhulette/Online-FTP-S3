<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DirectoryRepository;

class DirectoryController extends Controller
{
    /**
     * @var DirectoryRepository
     */
    private $directory;

    /**
     * __construct.
     *
     * @param DirectoryRepository $directory
     */
    public function __construct(DirectoryRepository $directory)
    {
        $this->directory = $directory;
    }

    /**
     * List directorys.
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        $path = $request->get('path', '/');

        return [
            'listing' => $this->directory->listing($path),
        ];
    }

    /**
     * Create directroy.
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $path = $request->get('path', '');

        return response([
            'success' => $this->directory->create($path),
        ], 201);
    }

    /**
     * Delete directory.
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $path = $request->input('path', null);

        $this->directory->delete($path);
    }
}
