<!-- Newsletter Widget -->
<div class="newsletter-widget mb-50">
    <h4>{{ __('hi.Newsletter') }}</h4>
    <p>Please Insert your detailes to subscribe our newsletter.</p>
    {!! Form::open(['route' => 'news.letters']) !!}
        {!! Form::text('name', null, array('placeholder' => 'Name', 'required', "oninvalid"=>"this.setCustomValidity('Please Enter Name')","oninput"=>"setCustomValidity('')", "autocomplete" => "off")) !!}
        {!! Form::text('email', null, array('placeholder'=> 'Email','required',"oninvalid"=>"this.setCustomValidity('Please Enter Email Address')","oninput"=>"setCustomValidity('')","pattern"=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$", "autocomplete" => "off")) !!}
        @if($errors->any())
            <p style="color:red">{{ $errors->first() }}</p>
        @endif
        {!! Form::button('Subscribe', ['class' => 'btn w-100', 'type' => 'submit']) !!}
    {!! Form::close() !!}
</div>