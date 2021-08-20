<div>
    <div class="row">
        @if(isset($prof_course['user']) && count($prof_course['user'])>0)
            @foreach ($prof_course['user'] as $item)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mr-2">
                            <b>{{$courses[$item['course_id']-1]['name']}}</b>
                        </div>
                        <span>{{$item['name']}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-12">Profesores no asignados</div>
        @endif
    </div> 
</div>
