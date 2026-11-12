<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|max:20',
            'section' => 'required|max:255',
            'image'   => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $validated['image'] = $this->uploadImage($request->file('image'));
        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student): View
    {
        return view('show', compact('student'));
    }

    public function edit(Student $student): View
    {
        return view('edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|max:20',
            'section' => 'required|max:255',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            File::delete(public_path('image/' . $student->image));
            $validated['image'] = $this->uploadImage($request->file('image'));
        } else {
            unset($validated['image']);
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        File::delete(public_path('image/' . $student->image));
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    private function uploadImage(UploadedFile $file): string
    {
        $name = date('YmdHis') . '_' . Str::random(4) . '.' . $file->extension();
        $file->move(public_path('image'), $name);
        return $name;
    }
}