<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Course;


class StudentController extends Controller
{

    public function destroy($studentId): RedirectResponse
    {
        $student = User::find($studentId);

        $student->assignment()->delete();
        $student->courses()->detach();
        $student->enrollment()->detach();

        $student->delete();

        return Redirect::to('manage-students')->with('success', 'Student deleted successfully');
    }

    public function index(): View
    {
        $students = User::role('student')->get();

        return view('admin.manage-students', compact('students'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $courses = Course::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            // ->orWhereHas('faculty', function ($query) use ($query) {
            //     $query->where('name', 'like', "%$query%");
            // })
            ->get();

        return view('student.course-catalog', compact('courses'));
    }
}