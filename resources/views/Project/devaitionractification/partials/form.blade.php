<div class="col-sm-11 col-md-11">
  <label for="Name" class="form-label">project</label>
    <select class="form-control" name="project_id" id="project_id" value="">
      @foreach($projects as $project)  
        <option value="{{ $project->id }}">{{ $project->name." | ".$project->kobo_form_id ." | ". $project->village }}</option>
      @endforeach
    </select>
    <i class="error_color" id="error_project_id" hidden>
    {{__('project_id') }} 
    </i> 
</div>
<div class="col-sm-11 col-md-11">
  <label for="devaition remarks" class="form-label">devaition remarks</label>
    <textarea class="form-control" name="devaition_remarks" id="devaition_remarks"></textarea>
    <i class="error_color" id="error_devaition_remarks" hidden>
    {{__('devaition_remarks') }} 
    </i> 
</div>




