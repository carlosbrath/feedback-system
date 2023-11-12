@extends('layouts.app')

@section('content')
<div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="{{ route('feedback.store') }}" method="post" class="agile_form">
            <h2>Feedback title</h2>
            @csrf
            <input type="text" placeholder="Feedback Title" name="title"  />
            <h2>Select Feedback Type</h2>
            <select name="category" >
                <option >select option</option>
                <option value="bug report">Bug Report</option>
                <option value="feature request">Feature Request</option>
                <option value="improvement">Improvement</option>
                <option value="other">other</option>
            </select>
			<h2>Your Feedback</h2>
			<textarea placeholder="Describe Feedback" class="w3l_summary" name="descrption" required=""></textarea>
			<center><input type="submit" value="submit" class="agileinfo" /></center>
	  </form>
	</div>
@endsection