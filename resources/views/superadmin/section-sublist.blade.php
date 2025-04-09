<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/ch-logo.png') }}" type="image/png" />
    @vite('public/icons/font/bootstrap-icons.css')
    @vite('resources/css/bootstrap.min.css')
    @vite('public/vendor/fontawesome-free/css/all.min.css')

    <title>CampusHub - {{ $section->title }} Subjects</title>

    @vite('resources/css/sb-admin-2.min.css')

    <style>
        .min-height {
            min-height: 200px;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        <x-superadminsidebar></x-superadminsidebar>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <x-superadmintopbar></x-superadmintopbar>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">{{ $section->title }} - Subjects</h1>
                    </div>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Please check the form below for errors.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif


                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Subjects in {{ $section->title }}</h6>
                            <button class="d-inline-block btn btn-sm btn-success shadow-sm add-btn" data-toggle="modal" data-target="#addSubject"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Add Subject</button>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @forelse ($section->subjects as $subject)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $subject->name }}
                                    {{-- Assuming you have a route named 'subjects.show' --}}
                                    {{-- <a href="{{ route('subjects.show', $subject->id) }}" class="btn btn-sm btn-info">
                                    View Details
                                    </a> --}}
                                    {{-- Add a detach button if needed --}}
                                    {{-- <form method="POST" action="{{ route('superadmin.section.subjects.detach', [$section->id, $subject->id]) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this subject?')">Remove</button>
                                    </form> --}}
                                </li>
                                @empty
                                <li class="list-group-item text-muted">No subjects assigned to this section.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Taurus Company 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- Add Subject Modal Form --}}
    {{-- Give your route a name in routes/web.php for easier referencing --}}
    {{-- Example: Route::post(...)->name('superadmin.section.subjects.add'); --}}
    <form method="POST" action="{{ route('superadmin.section.subjects.add') }}"> {{-- Use the route name --}}
        @csrf
        <div class="modal fade" id="addSubject" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubjectModalLabel">Add Subject to {{ $section->title }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        {{-- This hidden input sends the ID of the section we are currently viewing --}}
                        <input type="hidden" name="section_id" value="{{ $section->id }}">

                        <div class="form-group"> {{-- Wrap in form-group for better styling and error display --}}
                            <label for="subject_id" class="control-label">Subject</label>
                            {{-- ****** IMPORTANT: Change name="section_id" to name="subject_id" ****** --}}
                            <select name="subject_id" id="subject_id" class="form-control form-control-sm form-control-border @error('subject_id') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Select Subject --</option>
                                {{-- $subjects should contain all available subjects passed from the controller that shows this page --}}
                                @foreach($subjects as $subject)
                                {{-- Optionally, disable subjects already in the section --}}
                                <option value="{{ $subject->id }}" {{ $section->subjects->contains($subject->id) ? 'disabled' : '' }}>
                                    {{ $subject->name }} {{ $section->subjects->contains($subject->id) ? '(Already Added)' : '' }}
                                </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Add Subject</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <x-logoutmodal></x-logoutmodal>

    @vite('resources/js/jquery.min.js')
    @vite('resources/js/bootstrap.bundle.min.js')
    @vite('resources/js/jquery.easing.min.js')
    @vite('resources/js/sb-admin-2.min.js')
    {{-- Only include datatables if you are using them on this page --}}
    {{-- @vite('resources/js/jquery.dataTables.min.js') --}}
    {{-- @vite('resources/js/dataTables.bootstrap4.min.js') --}}
    {{-- @vite('resources/js/datatables-demo.js') --}}

</body>

</html>