<div id="modalTourJourney" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalTourLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 80%;">
    <div class="modal-content">
      <div class="modal-body">
        <textarea name="journey" id="journey" rows="10" cols="80">
        {{$tourDetail->tour_description_detail}}
        </textarea>
        <script>
        	// Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace( 'journey' );
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="#" name="saveJourney" id="saveJourney" class="btn btn-primary"> Save </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
