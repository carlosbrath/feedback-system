@extends('layouts.app2')

@section('content')
<div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="feedback.php" method="post" class="agile_form">
            <h2>Feedback title</h2>
            <input type="text" placeholder="Feedback Title" name="title"  />
            <h2>Select Feedback Type</h2>
            <select name="" id="">
                <option >select option</option>
                <option value="bug report">bug report</option>
                <option value="feature request">feature request</option>
                <option value="improvement">improvement</option>
                <option value="other">other</option>
            </select>
			<h2>Your Feedback</h2>
			<textarea placeholder="Describe Feedback" class="w3l_summary" name="descrption" required=""></textarea>
			<center><input type="submit" value="submit Feedback" class="agileinfo" /></center>
	  </form>
	</div>
@endsection