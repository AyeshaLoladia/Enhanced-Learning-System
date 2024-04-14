<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;

class CourseController extends Controller
{

    public function enrolledCourses()
{
    $user = Auth::user();

    $enrolledCourses = $user->courses;

    return view ('student.enrolled-courses', compact('enrolledCourses'));
}

    public function index()
    {
        $courses = Course::all();

        return view('student.course-catalog', compact('courses'));
    }
    public function create()
    {
        $types = ['Elective', 'Mandatory'];
        return view('admin.create-course', compact('types'));
    }

    // Store a newly created course in the database
    public function store(Request $request)
    {
        // dd($request->all());
        // Only allow admin users to create courses
        if (!$request->user()->hasRole('admin')) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to create a course');
        }

        //Find the faculty_id from the faculty name

        $request->validate([
            'title' => 'required|string|max:255',
            'placement' => 'required|string|max:255',
            'mandatory' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'email' => 'required|email',
        ]);

        // Find the faculty_id from the faculty name
        $facultymail = $request->input('email');
        $faculty = User::where('email', $facultymail)->first();

        if (!$faculty) {
            return redirect()->back()->with('error', 'Faculty not found with the provided email');
        }

        // Create a new course with the found faculty_id
        $course = new Course([
            'title' => $request->input('title'),
            'placement' => $request->input('placement'),
            'mandatory' => $request->input('mandatory'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        $course->faculty_id = $faculty->id;
        $course->save();

        // $course->save();

        return redirect()->route('manage-courses')->with('success', 'Course added successfully');
    }
    public function destroy(Request $request, $courseId)
    {
        if (!$request->user()->hasRole('admin')) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to create a course');
        }

        $course = Course::findOrFail($courseId);
        $course->material()->delete();
        $course->enrollment()->detach();
        $course->student()->detach();
        $course->delete();

        return redirect()->route('manage-courses')->with('success', 'Course deleted successfully');
    }

    // Show the form for adding a material to the course
    public function editCourse($courseId)
    {
        $course = Course::findOrFail($courseId);
        // if (is_null($course->material)) {
        //     $unitCount = 1;
        // } else {
        //     $unitCount = $course->material->count() + 1;
        // }
        $types = ['Elective', 'Mandatory'];

        return view('faculty.edit-course', compact('course', 'types'));
    }

    public function updateCourse(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);

        $course->update($request->all());
        $course->save();

        return redirect()->route('courses.edit', $course->id)->with('success', 'Link updated successfully');
    }
    // Store a newly created material in the database
    public function addMaterial(UpdateCourseRequest $request)
    {
        // $data = $request->all();
        

        $course = Course::findOrFail($request->input('course_id'));

        

        // Create a new material for the course
        $material = Material::firstOrCreate(
            ['unit' => $request->input('unit'), 'course_id' => $request->input('course_id')],
            ['unit' => $request->input('unit'), 'course_id' => $request->input('course_id')]
         );
         
        $course->material()->save($material);

        $material_index = $material->id;

        $unitCount = Content::where('material_id', $material->id)
        ->count();

        $content = Content::create([
            'material_id' => $material_index,
            'unit_index' => $unitCount + 1,
            'material_type' => $request->input('material_type'),
            'title' => $request->input('title'),
            'lecture_link' => $request->input('lecture_link'),
            'assignment_link' => $request->input('assignment_link'),
         ]);
         
         $material->content()->save($content);
         

        return redirect()->route('courses.edit', $course->id)->with('success', 'Material added successfully');
    }

    public function showFacultyCourses()
    {
        $user = Auth::user(); // Get the authenticated user

        $courses = $user->courses;

        return view('faculty.my-courses', compact('user', 'courses'));
    }

    public function courseDetails($courseId)
    {
        $course = Course::findOrFail($courseId);

        return view('faculty.course-details', compact('course'));
    }

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);

        return view('student.course-enrollment', compact('course'));
    }

    public function enrollRequest(Request $request, $courseId)
    {
        $user = Auth::user(); // Get the authenticated user

        $course = Course::findOrFail($courseId);

        $course->enrollment()->attach($user->id);

        return redirect()->route('dashboard')->with('success', 'You have been enrolled successfully');
    }

    public function learn($courseId)
    {
        $course = Course::findOrFail($courseId);

        $materials = $course->material;

        return view('student.view-course', compact('course', 'materials'));
    }

    public function updateContent(Request $request, $contentId)
    {
        $content = Content::findOrFail($contentId);
        $material = Material::findOrFail($content->material_id);
        $request->validate([
            'title' => 'required|string|max:255',
            'material_type' => 'required|string|max:255',
            'lecture_link' => 'string|max:255',
            'assignment_link' => 'string|max:255',
        ]);

        $content->update([
            'title' => $request->input('title'),
            'material_type' => $request->input('material_type'),
            'lecture_link' => $request->input('lecture_link'),
            'assignment_link' => $request->input('assignment_link'),
        ]);

        $content->save();

        return redirect()->route('courses.edit', $material->course_id)->with('success', 'Material updated successfully');
    }

    public function showCourses()
    {
        $courses = Course::all();

        return view('admin.manage-courses', compact('courses'));
    }
}