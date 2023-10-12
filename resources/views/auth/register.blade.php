@extends('layouts.app')
@section('styles')
<style type="text/css">
  body {
    padding-top: 66px  !important;
  }
</style>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row mb-5">
    <div class="col-md-6">
      <div class="p-4" style="">
        <div class="p-5 text-white" style="border-radius: 15px; background-color: #a1276d !important;">
          <h4>COLLEGE OF HEALTH SCIENCES EDUCATION</h4>
          <h5 class="mb-4">COLLEGE OBJECTIVES</h5>
          <ol>
            <li>
              Offer a curriculum that stimulates intellectual curiosity and develops ability of the students to understand themselves in promotion of health, prevention of illness, collaboration of health care during illness and restoration of health of the individuals, families and community in a changing society.
            </li>
            <li>
            Train effective community leaders and care managers who seek balance in health care resources and contribute to the advancement of the profession.
            </li>
            <li>
            Demonstrate professional values and behaviors and apply theory-based decision making in the delivery of health care services to the individuals, families and community.
            </li>
            <li>
            Provide a state-of-the-art learning landscape that promote excellence, encourages continuous learning and foster pride among the health care providers.
            </li>
            <li>
            Utilize theory and research in formulating evidence-based strategies, initiate changes, improve practices and influence health care policy in the delivery of health care services.
            </li>
            <li>
            Assume a leadership role within the health care delivery system to influence local, regional and national policies that impact on the quality of health care services for the marginalized community.
            </li>
            <li>
            Integrate sensitivity to cultural diversity and the unique characteristics of the individual, the family and the community in the development and implementation of health care services.
          </ol>
          <h4>NURSING PROGRAM</h4>
          <h5>PROGRAM EDUCATIONAL OBJECTIVES</h5>
          <p>
            Three to five years after graduation, the BS Nursing graduates will be able to:
          </p>
          <ol style="list-style-type: lower-alpha;">
            <li>
              demonstrate advance knowledge and skills in the practice of nursing profession through research and continuing professional development.
            </li>
            <li>
              exhibit social responsibility and assure leadership roles in health care services;
            </li>
            <li>
              communicate effectively in varied settings of diverse groups/cultures utilizing technology through written, oral and visual modes.
            </li>
          </ol>
          <h5>STUDENT OUTCOMES</h5>
          <p>
            By the time of graduation, the BS Nursing students should have the ability to:
          </p>
          <ol>
            </li>
            pursue professional and personal development to acquire new skills in the delivery of safe and quality health care services across the lifespan;
            </li>
            <li>
            practice safe, effective and quality nursing care services and other field of endeavor in varied settings;
            </li>
            <li>
            demonstrate collaboration and teamwork with other teamwork with other members of the health team through effective and therapeutic communication;
            </li>
            <li>
            exemplify ethico-legal and moral responsibilities to promote quality of life among clients regardless of socio-economic status, culture and religious affiliation;
            </li>
            <li>
            apply analytical and critical thinking skills in the care of clients with diverse conditions in varied settings;
            practice evidence-based health care services to promote/restore health, prevent illness and/or help terminally-ill client die with dignity;
            </li>
            <li>
            organize activities though efficient use and management of resources and environment to uplift the quality of life among members of the community.
            </li>
            <li>
            demonstrate caring attributes, love of God, country and people as health care practitioners committed to holistic care. 
            </li>
          </ol>
        </div>
      </div>
    </div>
    <div class="col-md-6 vh-100 sticky-top" >
      <div class="p-4" style="">
        <div class="card w-100">
          <div class="card-header bg-transparent border-0 p-3">
            <h3 class="mb-0 text-capitalize">Student Registration</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" data-ajax="true" autocomplete="false">
              @csrf
              @php
                $roles = [
                  'student' => 3,
                  'teacher' => 2,
                ];
              @endphp
              <input type="hidden" name="role_id" value="{{ $roles[$type] }}">
              <div class="row">
                <div class="col">
                  <div class="mb-2 ">
                    <label class="mb-1 ">Subject Code</label>  
                    <input 
                      name="subject_code_id" 
                      class="form-control" 
                      value="" 
                      placeholder="Subject Code"
                      autocomplete="off"
                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      type="number"
                      maxlength="6"
                    >
                  </div>
                </div>
                <div class="col">
                  <div class="mb-2 ">
                    <label class="mb-1 ">Student No.</label>  
                    <input 
                      name="student_no" 
                      class="form-control" 
                      value="" 
                      placeholder="Student No." 
                      autocomplete="off"
                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      type="number"
                      maxlength="6"
                    >
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  @include('generate.input', [
                    'label' => 'First Name',
                    'name' => 'first_name',
                    'value' => '',
                    'formGroupClass' => '',
                  ])
                </div>
                <div class="col">
                  @include('generate.input', [
                    'label' => 'Last Name',
                    'name' => 'last_name',
                    'value' => '',
                    'formGroupClass' => '',
                  ])
                </div>
              </div>
              @include('generate.input', [
                'label' => 'UM Email',
                'name' => 'email',
                'value' => '',
                'formGroupClass' => '',
              ])
              <div class="alert alert-primary" role="alert">
                Note: USE YOUR UMINDANAO ACCOUNT
              </div>
              <div class="row">
                <div class="col">
                  @include('generate.input', [
                    'label' => 'Password',
                    'type' => 'password',
                    'name' => 'password',
                    'value' => '',
                    'formGroupClass' => '',
                  ])
                </div>
                <div class="col">
                  @include('generate.input', [
                    'label' => 'Confirm Password',
                    'type' => 'password',
                    'name' => 'password_confirmation',
                    'value' => '',
                    'formGroupClass' => '',
                  ])
                </div>
              </div>
              <p>Registering means that you agree with our <a href="#" data-bs-toggle="modal" data-bs-target="#onload">Privacy Policy</a></p>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-maroon mb-5">
                {{ __('Register') }}
                </button>
              </div>
              <div class="text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
              </div> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
@endsection