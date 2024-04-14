<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Course;


class FacultyController extends Controller
{
    public function index(): View
    {
        $faculties = User::role('faculty')->get();

        return view('admin.manage-faculty', compact('faculties'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function create(): View
    {
        return view('admin.add-faculty');
    }

    public function store(Request $request)
    {
        if (!$request->user()->hasRole('admin')) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to create a course');
        }

        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,',
            'rollno' => 'required|int|min: 0|unique:users,rollno,',
            // Add more validation rules as needed
        ]);

        $faculty = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => 'password@1',
            'user_type' => 'Somaiya',
            'rollno' => $request->input('rollno'),
        ])->assignRole('faculty');

        $faculty->save();

        return redirect()->route('dashboard')->with('success', 'Faculty member updated successfully');
    }

    public function destroy($facultyId)
    {
        $faculty = User::find($facultyId);

        $faculty->courses()->delete();

        $faculty->delete();

        return redirect()->route('manage-faculty')->with('success', 'Faculty member deleted successfully');
    }

    public function studentIndex($courseId): View
    {
        $course = Course::find($courseId);
        $students = $course->student;
        $pending_students = $course->enrollment;

        return view('faculty.student-list', compact('students', 'pending_students', 'course'));
    }

    public function studentAccept($studentId, $courseId): RedirectResponse
    {
        $course = Course::find($courseId);
        $course->student()->attach($studentId);
        $course->enrollment()->detach($studentId);

        return redirect()->route('student-list', ['courseId' => $courseId])->with('success', 'Student accepted successfully');
    }

    public function studentReject($studentId, $courseId): RedirectResponse
    {
        $course = Course::find($courseId);
        $course->enrollment()->detach($studentId);

        return redirect()->route('student-list', ['courseId' => $courseId])->with('success', 'Student rejected successfully');
    }
}