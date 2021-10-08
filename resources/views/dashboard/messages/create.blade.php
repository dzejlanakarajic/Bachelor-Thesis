@extends('layouts.message') @section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> @endsection @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Send a new message</h1>
            <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <div>
                    <!-- Subject Form Input -->
                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                    </div>

                    <!-- Message Form Input -->
                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                    </div>
                    @role('student')
                    <div class="form-group">
                        <!-- List of all professors for students -->
                        <label class="control-label">Send To</label>
                        <select name="recipients" class="form-control myselect">
                                @foreach($professors as $professor)
                                <option value="{{$professor->id}}">{{$professor->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    @endrole @role('administrator|coordinator|professor') @if($users->count() > 0)
                    <div class="form-group">
                        <label class="control-label">Send To</label>
                        <select class="form-control select2-multi" name="recipients[]" multiple="multiple" required>
                                @foreach($users as $user)
                                <option value='{{ $user->id }}'>{{ $user->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    @endif @endrole
                    <!-- Submit Form Input -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $('.select2-multi').select2();
</script>
<script type="text/javascript">
    $(".myselect").select2();
</script>
@endsection