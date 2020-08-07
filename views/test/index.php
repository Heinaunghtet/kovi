<article>
    <div id="container">
        <form action="signup.html" method="post" id="signup">
            <h1>Sign Up</h1>
            <input type="text" placeholder="Full Name">
            <input type="text" placeholder="Email Address">
            <input type="checkbox" name="color" value="red">
            <input type="checkbox" name="color" value="red">
            <input type="checkbox" name="color" value="red">
            <input type="submit" value="Subscribe">
        </form>
    </div>
    <script type="text/javascript">
    function error(input, message) {
    input.className = 'error';
    // show the error message
    let check = input.previousElementSibling;
    //console.log(check.nodeName);
    if(check.nodeName=='SMALL'){
    check.innerText = message;
    }else{
    let newEle = document.createElement("small");
    let parentDiv = input.parentNode;
    newEle.innerText = message;
    parentDiv.insertBefore(newEle, input);
    }
    
    
    
    return false;
    
    }
    function success(input) {
    input.className = 'success';
    // hide the error message
    const error = input.previousElementSibling;
    error.innerText = '';
    return true;
    }
    function requireValue(input, message) {
    return input.value.trim() === '' ?
    error(input, message) :
    success(input);
    }
    function validateEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(input.value.trim()) ?
    success(input) :
    error(input, 'Invalid email format');
    }
    function validateCheck(input) {
    const re = input.checked ;
    return re == true ?
    success(input) :
    error(input, 'Select one value');
    }
    // select the form
    const form = document.getElementById('signup');
    // get name and email elements
    const name = form.elements[0];
    const email = form.elements[1];
    const color = form.elements[2];
    console.log(color.checked);
    const requiredFields = [
    {input: name, message: 'Name is required'},
    {input: email,message: 'Email is required'}
    
    ];
    form.addEventListener('submit', (event) => {
    // check required fields
    let valid = true;
    requiredFields.forEach((input) => {
    valid = requireValue(input.input, input.message);
    });
    // validate email
    if (valid) {
    valid = validateEmail(email);
    }
    if (valid) {
    valid = validateCheck(color);
    }
    // stop submitting the form if the data is invalid
    if (!valid) {
    event.preventDefault();
    } else {
    alert('This is a demo. No form posting.')
    }
    });
    
    </script>
</article>