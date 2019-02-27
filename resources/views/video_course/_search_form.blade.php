<form method="GET" action="{{ route('video_courses.index') }}" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" 
        type="text"
        placeholder="Search by picture title..."
        value="{{$searchTitle}}"
        name="searchTitle"
        aria-label="Search">

    <select id="filterSubject" name="filterSubject" class="form-control mr-sm-2">
        <option selected value="0">Предмет..</option>
        @foreach($subjects as $subject )
            <option value="{{ $subject->id }}" {{ ( $subject->id == $selectedSubjectId ) ? 'selected' : '' }} >{{ $subject->title }}</option>
        @endforeach
    </select>

    <button class="btn btn-outline-dark btn-sm"
        type="submit">Търси</button>
</form>