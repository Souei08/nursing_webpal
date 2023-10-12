<?php

function countLevelOfConsciousness($id)
{
    return DB::table('level_of_consciousnesses')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countRespiratorySystem($id)
{
    return DB::table('respiratory_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countCardiovascularSystem($id)
{
    return DB::table('cardiovascular_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countGastrointestinalSystem($id)
{
    return DB::table('gastrointestinal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countGenitourinarySystem($id)
{
    return DB::table('genitourinary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countMusculosketalSystem($id)
{
    return DB::table('musculosketal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countIntegumentarySystem($id)
{
    return DB::table('integumentary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}

function countPainAssessment($id)
{
    return DB::table('pain_assessments')
        ->where('ward_nurses_progress_note_id', $id)
        ->count();
}









function levelOfConsciousnessShiftAvailability($id, $shift)
{
    $query = DB::table('level_of_consciousnesses')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('lvl_of_consciousness_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function RespiratorySystemShiftAvailability($id, $shift)
{
    $query = DB::table('respiratory_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('rs_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function cardiovascularSystemShiftAvailability($id, $shift)
{
    $query = DB::table('cardiovascular_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('cs_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function gastrointestinalSystemShiftAvailability($id, $shift)
{
    $query = DB::table('gastrointestinal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gas_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function genitourinarySystemShiftAvailability($id, $shift)
{
    $query = DB::table('genitourinary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gen_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function musculosketalSystemShiftAvailability($id, $shift)
{
    $query = DB::table('musculosketal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('ms_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function integumentarySystemShiftAvailability($id, $shift)
{
    $query = DB::table('integumentary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('is_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}

function painAssessmentShiftAvailability($id, $shift)
{
    $query = DB::table('pain_assessments')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('pa_shift', $shift)
        ->first();

    if ($query) {
        return false;
    }

    return true;
}







function levelOfConsciousnessAMShift($id)
{
    return DB::table('level_of_consciousnesses')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('lvl_of_consciousness_shift', 'AM Shift')
        ->first();
}

function RespiratorySystemAMShift($id)
{
    return DB::table('respiratory_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('rs_shift', 'AM Shift')
        ->first();
}

function cardiovascularSystemAMShift($id)
{
    return DB::table('cardiovascular_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('cs_shift', 'AM Shift')
        ->first();
}

function gastrointestinalSystemAMShift($id)
{
    return DB::table('gastrointestinal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gas_shift', 'AM Shift')
        ->first();
}

function genitourinarySystemAMShift($id)
{
    return DB::table('genitourinary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gen_shift', 'AM Shift')
        ->first();
}

function musculosketalSystemAMShift($id)
{
    return DB::table('musculosketal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('ms_shift', 'AM Shift')
        ->first();
}

function integumentarySystemAMShift($id)
{
    return DB::table('integumentary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('is_shift', 'AM Shift')
        ->first();
}

function painAssessmentAMShift($id)
{
    return DB::table('pain_assessments')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('pa_shift', 'AM Shift')
        ->first();
}









function levelOfConsciousnessPMShift($id)
{
    return DB::table('level_of_consciousnesses')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('lvl_of_consciousness_shift', 'PM Shift')
        ->first();
}

function RespiratorySystemPMShift($id)
{
    return DB::table('respiratory_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('rs_shift', 'PM Shift')
        ->first();
}

function cardiovascularSystemPMShift($id)
{
    return DB::table('cardiovascular_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('cs_shift', 'PM Shift')
        ->first();
}

function gastrointestinalSystemPMShift($id)
{
    return DB::table('gastrointestinal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gas_shift', 'PM Shift')
        ->first();
}

function genitourinarySystemPMShift($id)
{
    return DB::table('genitourinary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gen_shift', 'PM Shift')
        ->first();
}

function musculosketalSystemPMShift($id)
{
    return DB::table('musculosketal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('ms_shift', 'PM Shift')
        ->first();
}

function integumentarySystemPMShift($id)
{
    return DB::table('integumentary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('is_shift', 'PM Shift')
        ->first();
}

function painAssessmentPMShift($id)
{
    return DB::table('pain_assessments')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('pa_shift', 'PM Shift')
        ->first();
}





function levelOfConsciousnessNOCShift($id)
{
    return DB::table('level_of_consciousnesses')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('lvl_of_consciousness_shift', 'NOC Shift')
        ->first();
}

function RespiratorySystemNOCShift($id)
{
    return DB::table('respiratory_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('rs_shift', 'NOC Shift')
        ->first();
}

function cardiovascularSystemNOCShift($id)
{
    return DB::table('cardiovascular_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('cs_shift', 'NOC Shift')
        ->first();
}

function gastrointestinalSystemNOCShift($id)
{
    return DB::table('gastrointestinal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gas_shift', 'NOC Shift')
        ->first();
}

function genitourinarySystemNOCShift($id)
{
    return DB::table('genitourinary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('gen_shift', 'NOC Shift')
        ->first();
}

function musculosketalSystemNOCShift($id)
{
    return DB::table('musculosketal_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('ms_shift', 'NOC Shift')
        ->first();
}

function integumentarySystemNOCShift($id)
{
    return DB::table('integumentary_systems')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('is_shift', 'NOC Shift')
        ->first();
}

function painAssessmentNOCShift($id)
{
    return DB::table('pain_assessments')
        ->where('ward_nurses_progress_note_id', $id)
        ->where('pa_shift', 'NOC Shift')
        ->first();
}




function intravenousFluid($id)
{
    return DB::table('intravenous_fluids')
        ->where('ward_nurses_progress_note_id', $id)
        ->get();
}

function doctorsVisit($id)
{
    return DB::table('doctors_visits')
        ->where('ward_nurses_progress_note_id', $id)
        ->get();
}

function nursingDocumentation($id)
{
    return DB::table('nursing_documentations')
        ->where('ward_nurses_progress_note_id', $id)
        ->get();
}

function handoverNotes($id)
{
    return DB::table('handovers')
        ->where('ward_nurses_progress_note_id', $id)
        ->get();
}
