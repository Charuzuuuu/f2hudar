var editedStatus = ""; 
var editedNum = "";
var editedHome = "";
var editedEmail = "";
var editedHobby = "";
var editedCountry = "";

function editHobby() {
    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Hobby");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedHobby = x.value;
        } else {
            alert("Please enter a Hobby.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo1").appendChild(x);
    document.getElementById("demo1").appendChild(saveBtn);
    document.getElementById("demo1").appendChild(closeBtn);
}

function editCountry() {
    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Country");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedCountry = x.value;
        } else {
            alert("Please enter a Country.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo2").appendChild(x);
    document.getElementById("demo2").appendChild(saveBtn);
    document.getElementById("demo2").appendChild(closeBtn);
}

function editNum() {
    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Contact Number");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedNum = x.value;
        } else {
            alert("Please enter a Contact Number.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo3").appendChild(x);
    document.getElementById("demo3").appendChild(saveBtn);
    document.getElementById("demo3").appendChild(closeBtn);
}

function editStatus() {

    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Civil Status");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedStatus = x.value;
        } else {
            alert("Please enter your Civil Status.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo4").appendChild(x);
    document.getElementById("demo4").appendChild(saveBtn);
    document.getElementById("demo4").appendChild(closeBtn);
}

function editHome() {
    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Home Address");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedHome = x.value;
        } else {
            alert("Please enter a Home Address.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo5").appendChild(x);
    document.getElementById("demo5").appendChild(saveBtn);
    document.getElementById("demo5").appendChild(closeBtn);
}

function editEmail() {
    var editBtn = event.target;
    editBtn.style.display = 'none';

    var x = document.createElement("INPUT");
    x.setAttribute("type", "text");
    x.setAttribute("class", "inputBox");
    x.setAttribute("placeholder", "Edit Email");

    // Create a new button element for "Close"
    var closeBtn = document.createElement("BUTTON");
    closeBtn.innerHTML = "Close";
    closeBtn.setAttribute("class", "closebtn");

    // Create a new button element for "Save"
    var saveBtn = document.createElement("BUTTON");
    saveBtn.innerHTML = "Save";
    saveBtn.setAttribute("class", "savebtn");
    saveBtn.onclick = function() { 
        // Add your save functionality here
        if (x.value.trim() !== "") {
            // Update the table row with the new contact number
            var hobbyCell = editBtn.parentElement.previousElementSibling;
            hobbyCell.textContent = x.value;

            editedEmail = x.value;
        } else {
            alert("Please enter an Email.");
        }
    };

    closeBtn.onclick = function() { 
        this.parentElement.removeChild(this.previousSibling); // Remove "Save" button
        this.parentElement.removeChild(this.previousSibling); // Remove input
        this.parentElement.removeChild(this); // Remove "Close" button
        editBtn.style.display = 'inline';
    };

    // Append the input and button elements to the demo div
    document.getElementById("demo6").appendChild(x);
    document.getElementById("demo6").appendChild(saveBtn);
    document.getElementById("demo6").appendChild(closeBtn);
}


function submit() {

    if (editedStatus === "" && editedEmail === "" && editedNum === "" && editedHome === "" && editedCountry === "" && editedHobby === "") {
        alert("Please edit at least one field before submitting.");
        return;  // Stop the function here
    }
    // Create a form
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "confirmform.php");

    // Create an input field for the edited status
    var statusInput  = document.createElement("input");
    statusInput.setAttribute("type", "hidden");
    statusInput.setAttribute("name", "editedStatus");
    statusInput.setAttribute("value", editedStatus);

    var emailInput   = document.createElement("input");
    emailInput.setAttribute("type", "hidden");
    emailInput.setAttribute("name", "editedEmail");
    emailInput.setAttribute("value", editedEmail);

    var numInput   = document.createElement("input");
    numInput.setAttribute("type", "hidden");
    numInput.setAttribute("name", "editedNum");
    numInput.setAttribute("value", editedNum);

    var homeInput   = document.createElement("input");
    homeInput.setAttribute("type", "hidden");
    homeInput.setAttribute("name", "editedHome");
    homeInput.setAttribute("value", editedHome);

    var countryInput   = document.createElement("input");
    countryInput.setAttribute("type", "hidden");
    countryInput.setAttribute("name", "editedCountry");
    countryInput.setAttribute("value", editedCountry);

    var hobbyInput   = document.createElement("input");
    hobbyInput.setAttribute("type", "hidden");
    hobbyInput.setAttribute("name", "editedHobby");
    hobbyInput.setAttribute("value", editedHobby);


    // Add the input field to the form
    form.appendChild(statusInput);
    form.appendChild(emailInput);
    form.appendChild(numInput);
    form.appendChild(homeInput);
    form.appendChild(countryInput);
    form.appendChild(hobbyInput);

    // Add the form to the body (it will not be visible)
    document.body.appendChild(form);

    // Show a confirmation popup
        form.submit();
}
