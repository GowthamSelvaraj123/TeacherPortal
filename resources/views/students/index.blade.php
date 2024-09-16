<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-5" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                        {{ $errors->first('error') }}
                    </div>
                    @endif

                    <table class="student-list table-fixed w-full">
                        <thead>
                            <tr class="border-b-2">
                                <th class="text-left py-2 text-gray-500">Name</th>
                                <th class="text-left py-2 text-gray-500">Subject</th>
                                <th class="text-left py-2 text-gray-500">Mark</th>
                                <th class="text-left py-2 text-gray-500" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($students && $students->count() > 0)
                            @foreach($students as $student)
                            <tr class="border-b-2">
                                <td class="py-2">
                                    <div class="student-details-wrap">
                                        <div class="user-profile">{{ strtoupper(substr($student->students_name, 0, 1)) }}</div>{{$student->students_name}}
                                    </div>
                                </td>
                                <td class="py-2">{{$student->students_subject}}</td>
                                <td class="py-2">{{$student->students_marks}}</td>
                                <td class="py-2 dropdown-row">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div class="dropdown-arrow"><i class="fa fa-sort-desc" aria-hidden="true"></i></div>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link href="#" id="openModalBtn" data-modal="popupModal{{ route('students.destroy', $student->id) }}">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                            <div id="popupModal{{ route('students.destroy', $student->id) }}" class="popup-modal">
                                <div class="modal-content">
                                    <span class="close" data-modal="popupModal{{ route('students.destroy', $student->id) }}">&times;</span>
                                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_name" value="{{ old('students_name', $student->students_name) }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_subject" value="{{ old('students_subject', $student->students_subject) }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2">Marks</label>
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_marks" value="{{ old('students_marks', $student->students_marks) }}">
                                        </div>
                                        <button class="primary-button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="pt-4 text-center">No data found.</td>
                            <tr>
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center">
                <button id="popupBtn" data-modal="popupModal1" class="primary-button inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                <div id="popupModal1" class="popup-modal">
                    <div class="modal-content">
                        <span class="close" data-modal="popupModal1">&times;</span>
                        <form action="{{route('students.store')}}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_subject">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Marks</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="students_marks">
                            </div>
                            <button class="primary-button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>