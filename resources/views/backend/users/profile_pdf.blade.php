<?php
$content = '<div class="basic_info"><div style="text-align: center">
    <table>
    <tbody>
    <tr>
    <td><img style="margin-right:25px; border:1px solid #cccccc; padding:5px;height: 110px;" src="'.asset($user->personal_information->image).'"></td>
    <td><h2>'.$user->name.'</h2>
                Address   :     <small>'.$user->personal_information->present_address.'</small><br>
                Mobile No :     <small>'.$user->personal_information->mobile.'</small><br>
                Email     :     <small>'.$user->email.'</small><br>
     </td>
     </tr>
     </tbody>
     </table>
</div><hr>';

$content = $content.'<h3><b>Personal Information </b></h3>';
$content = $content.'<table class="table-style-four">
<tr>
    <td>Fathers Name: <span>'.$user->personal_information->fathers_name.'</span></td>
    <td>Mothers Name: <span>'.$user->personal_information->mothers_name.'</span></td>
</tr>

<tr>
    <td>Date of Birth: <span>'.date('d F, Y',strtotime($user->personal_information->birth_date)).'</span></td>
    <td>Gender: <span>'.$user->personal_information->gender.'</span></td>
</tr>
<tr>
    <td>Marital Status: <span>'.$user->personal_information->marital_status.'</span></td>
    <td>Nationality: <span>'.$user->personal_information->nationality.'</span></td>
</tr>
<tr>
    <td>National ID NO: <span>'.$user->personal_information->national_id_no.'</span></td>
    <td>Religion: <span>'.$user->personal_information->religion.'</span></td>
</tr>
<tr>
    <td>Permanent Address: <span>'.$user->personal_information->permanent_address.'</span></td>
    <td>Home District: <span>'.$user->personal_information->home_district.'</span></td>
</tr>
<tr>
    <td>Upazila: <span>'.$user->personal_information->upazila.'</span></td>
    <td>Current Location: <span>'.$user->personal_information->current_location.'</span></td>
</tr>
</table><br>';

$content = $content.'<h3><b>Academic Qualification</b></h3>';
$content = $content.'<table class="table table-style-two">';
$content = $content.'<thead>
<tr>
    <th>Exam Name</th>
    <th>Board/University</th>
    <th>Group/Major</th>
    <th>Institution</th>
    <th>GPA/CGPA/Result</th>
    <th>Year of Passing</th>
</tr>
</thead><tbody>';
foreach($user->academic_qualification as $aca){
    $content = $content.'<tr>
    <td>'.$aca->exam_title.'</td>
    <td>'.$aca->board_university.'</td>
    <td>'.$aca->major.'</td>
    <td>'.$aca->institute.'</td>
    <td>'.$aca->result.'</td>
    <td>'.$aca->passing_year.'</td>
</tr>';
}
$content = $content.'</tbody></table><br>';

$content = $content.'<h3><b>Training Summery</b></h3>';
$content = $content.'<table class="table table-style-two">';
$content = $content.'<thead>
<tr>
    <th>Training Name</th>
    <th>Topic</th>
    <th>Institution</th>
    <th>Country</th>
    <th>Location</th>
    <th>Year</th>
    <th>Duration</th>
</tr>
</thead><tbody>';
foreach($user->training_information as $training){
    $content = $content.'<tr>
    <td>'.$training->training_title.'</td>
    <td>'.$training->topic.'</td>
    <td>'.$training->institute.'</td>
    <td>'.$training->country.'</td>
    <td>'.$training->location.'</td>
    <td>'.$training->year.'</td>
    <td>'.$training->duration.'</td>
</tr>';
}
$content = $content.'</tbody></table><br>';

$content = $content.'<h3><b>Special Qualification</b></h3>';
$content = $content.'<table class="table table-style-two">';
$content = $content.'<thead>
<tr>
    <th>Qualification Name</th>
    <th>Qualification Details</th>
</tr>
</thead><tbody>';
foreach($user->special_qualification as $special){
    $content = $content.'<tr>
    <td>'.$special->qualification_name.'</td>
    <td>'.$special->qualification_details.'</td>
</tr>';
}
$content = $content.'</tbody></table><br>';

$content = $content.'<h3><b>Employment History</b></h3>';
$content = $content.'<table class="table table-style-two">';
$content = $content.'<thead>
<tr>
    <th>Company Name</th>
    <th>Company Business</th>
    <th>Designation</th>
    <th>Department</th>
    <th>Responsibility</th>
    <th>Company Address</th>
    <th>Start Date</th>
    <th>End Date</th>
</tr>
</thead><tbody>';
foreach($user->employment_history as $employment){
    $content = $content.'<tr>
    <td>'.$employment->company_name.'</td>
    <td>'.$employment->company_business.'</td>
    <td>'.$employment->designation.'</td>
    <td>'.$employment->department.'</td>
    <td>'.$employment->responsibility.'</td>
    <td>'.$employment->company_address.'</td>
    <td>'.date('d F, Y',strtotime($employment->start_date)).'</td>
    <td>';
    if($employment->end_date == ''){
        $content = $content.'Continue';
    }else{
        date('d F, Y',strtotime($employment->end_date));
    }
    $content = $content.'</td>
</tr>';
}
$content = $content.'</tbody></table><br>';

$content = $content.'<h3><b>Professional Qualification</b></h3>';
$content = $content.'<table class="table table-style-two">';
$content = $content.'<thead>
<tr>
    <th>Certificate Name</th>
    <th>Institute</th>
    <th>Location</th>
    <th>Form Date</th>
    <th>To Date</th>
</tr>
</thead><tbody>';
foreach($user->professional_qualification as $professional){
    $content = $content.'<tr>
    <td>'.$professional->certificate_name.'</td>
    <td>'.$professional->institute.'</td>
    <td>'.$professional->location.'</td>
    <td>'.date('d F, Y',strtotime($professional->form_date)).'</td>
    <td>'.date('d F, Y',strtotime($professional->to_date)).'</td>
</tr>';
}
$content = $content.'</tbody></table><br>';


$content = $content.'</div>';

echo $content;

?>