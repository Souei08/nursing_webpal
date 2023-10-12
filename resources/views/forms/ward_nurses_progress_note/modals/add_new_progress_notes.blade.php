<form method="GET" action="{{ route('ward_nurses_progress_notes.add-new-progress-notes') }}">
    <div class="modal" tabindex="-1" id="add-new-progress-notes">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        Add New Progress Note
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $wardNurseProgressNote->id }}">

                    <div class="form-group">
                        <label for="progressNotes">Select:</label>
                        <select class="form-select" name="progress_notes" id="progressNotes"
                            aria-label="Default select example">
                            @if (countLevelOfConsciousness($wardNurseProgressNote->id) < 3)
                                <option>Level of Consciousness</option>
                            @endif

                            @if (countRespiratorySystem($wardNurseProgressNote->id) < 3)
                                <option>Respiratory System</option>
                            @endif

                            @if (countCardiovascularSystem($wardNurseProgressNote->id) < 3)
                                <option>Cardiovascular System</option>
                            @endif

                            @if (countGastrointestinalSystem($wardNurseProgressNote->id) < 3)
                                <option>Gastrointestinal System</option>
                            @endif

                            @if (countGenitourinarySystem($wardNurseProgressNote->id) < 3)
                                <option>Genitourinary System</option>
                            @endif

                            @if (countMusculosketalSystem($wardNurseProgressNote->id) < 3)
                                <option>Musculosketal System</option>
                            @endif

                            @if (countIntegumentarySystem($wardNurseProgressNote->id) < 3)
                                <option>Integumentary System</option>
                            @endif

                            @if (countPainAssessment($wardNurseProgressNote->id) < 3)
                                <option>Pain Assessment</option>
                            @endif

                            <option>Intravenous Fluid</option>
                            <option value="Doctors Visit">Doctor\'s Visit</option>
                            <option>Nursing Documentation</option>
                            <option>Handover Notes</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
            </div>
        </div>
    </div>
</form>
