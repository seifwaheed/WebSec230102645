<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transcript;

class TranscriptController extends Controller
{
    public function index()
    {
        // Fetch transcript for the authenticated user
        $transcript = Transcript::where('user_id', Auth::id())->get();

        return view('transcript.index', compact('transcript'));
    }
}

