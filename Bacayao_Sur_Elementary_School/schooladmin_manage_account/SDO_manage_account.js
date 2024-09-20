//filter
function toggleFilterOptions() {
    var filterOptions = document.getElementById("filterOptions");
    if (filterOptions.style.display === "block") {
        filterOptions.style.display = "none";
    } else {
        filterOptions.style.display = "block";
    }
}

//action button
function toggleActionsDropdown(button) {
    var dropdown = button.closest('.actions-container').querySelector('.action-option');
    dropdown.classList.toggle("show");
}
function activate(employmentNumber) {
    document.getElementById("activateBtn_" + employmentNumber).disabled = true;
    document.getElementById("deactivateBtn_" + employmentNumber).disabled = false;
}
function deactivate(employmentNumber) {
    document.getElementById("deactivateBtn_" + employmentNumber).disabled = true;
    document.getElementById("activateBtn_" + employmentNumber).disabled = false;
}



//plus button
document.addEventListener("DOMContentLoaded", function() {
    const plusButton = document.getElementById('plusButton');
    const addbuttonContent = document.getElementById('createAccountDropdown');

    plusButton.addEventListener('click', function(event) {
        addbuttonContent.style.display = addbuttonContent.style.display === 'block' ? 'none' : 'block';
        
        event.preventDefault();
    });
});


//add form log in container 
//sdo admin
function showLoginContainer(accountType) {
    var loginContainer = document.querySelector('.login-container');
    var overlay = document.querySelector('.overlay'); 
    overlay.style.display = 'block';
    loginContainer.style.display = 'block';

    var loginContainerTitle = loginContainer.querySelector('h2');
    loginContainerTitle.textContent = accountType;

    var closeButton = loginContainer.querySelector('.close');
    closeButton.addEventListener('click', function() {
        hideLoginContainer();
    });
}

function hideLoginContainer() {
    var loginContainer = document.querySelector('.login-container');
    var overlay = document.querySelector('.overlay');
    loginContainer.style.display = 'none';
    overlay.style.display = 'none';
}

var overlay = document.querySelector('.overlay'); 
overlay.addEventListener('click', hideLoginContainer);

//schooladmin
function showAdviserLoginContainer() {
    var loginContainer = document.querySelector('.login-container.adviser');
    var overlay = document.querySelector('.overlay'); 
    overlay.style.display = 'block';
    loginContainer.style.display = 'block';

    var closeButton = loginContainer.querySelector('.close');
    closeButton.addEventListener('click', function() {
        hideLoginContainerAdviser();
    });
}

function hideLoginContainerAdviser() {
    var loginContainer = document.querySelector('.login-container.adviser');
    var overlay = document.querySelector('.overlay');
    loginContainer.style.display = 'none';
    overlay.style.display = 'none';
}

var overlay = document.querySelector('.overlay'); 
overlay.addEventListener('click', hideLoginContainerAdviser);

//guidance
function showGuidanceLoginContainer() {
    var loginContainer = document.querySelector('.login-container.guidance');
    var overlay = document.querySelector('.overlay'); 
    overlay.style.display = 'block';
    loginContainer.style.display = 'block';

    var closeButton = loginContainer.querySelector('.close');
    closeButton.addEventListener('click', function() {
        hideLoginContainerGuidance();
    });

}

function hideLoginContainerGuidance() {
    var loginContainer = document.querySelector('.login-container.guidance');
    var overlay = document.querySelector('.overlay');
    loginContainer.style.display = 'none';
    overlay.style.display = 'none';
}

function createAccount(accountType) {
    if (accountType === 'Principal') {
        showLoginContainer(accountType);
    } else if (accountType === 'Adviser') {
        showAdviserLoginContainer();
    } else if (accountType === 'Guidance Counselor') {
        showGuidanceLoginContainer();
}
}

var overlay = document.querySelector('.overlay'); 
overlay.addEventListener('click', hideLoginContainerExecutive);



//select school options
var schoolInput = document.getElementById("schoolName");
var schoolDropdown = document.getElementById("schoolDropdown");

schoolDropdown.addEventListener("click", function(event) {
  if (event.target.tagName === "A") {
    schoolName.value = event.target.textContent;
  }
});

function filterSchools() {
    var input, filter, dropdown, a, i, txtValue;
    input = document.getElementById("schoolName");
    filter = input.value.toUpperCase();
    dropdown = document.getElementById("schoolDropdown");
    a = dropdown.getElementsByTagName("a");
    if (filter === "") {
        dropdown.style.display = "none";
        return;
    }
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
    dropdown.style.display = "block";
}



//edit form
function toggleEditContainer(editButton) {
    var editContainer = document.querySelector('.edit-container');
    var overlay = document.querySelector('.overlay'); 
    editContainer.style.display = 'block';
    overlay.style.display = 'block';

    var row = editButton.closest('tr');

    var fullName = row.querySelector('.rows:nth-child(1)').textContent;
    var employeeNumber = row.querySelector('.rows:nth-child(2)').textContent;
    var email = row.querySelector('.rows:nth-child(3)').textContent;
    var dateAdded = row.querySelector('.rows:nth-child(4)').textContent;

    console.log("Full Name:", fullName);
    console.log("Employee Number:", employeeNumber);
    console.log("Email:", email);
    console.log("Date Added:", dateAdded);

    document.getElementById('full-name').value = fullName;
    document.getElementById('idnum').value = employeeNumber;
    document.getElementById('email').value = email;
    document.getElementById('date-added').value = dateAdded;

    var position = row.querySelector('.rows:nth-child(5)').textContent;
    var editContainerTitle = document.querySelector('.edit-container h2');
    editContainerTitle.textContent = position;

    var closeButton = editContainer.querySelector('.close');
    closeButton.addEventListener('click', function() {
        hideEditContainer();
    });
}

function hideEditContainer() {
    var editContainer = document.querySelector('.edit-container');
    var overlay = document.querySelector('.overlay'); 
    editContainer.style.display = 'none';
    overlay.style.display = 'none';
}

function handleEditButtonClick() {
    toggleEditContainer();
}

var editButtons = document.querySelectorAll('#actionsDropdown button:nth-child(1)');
editButtons.forEach(function(button) {
    button.addEventListener('click', handleEditButtonClick);
});

var overlay = document.querySelector('.overlay'); 
overlay.addEventListener('click', hideEditContainer);




//date
var currentDate = new Date();

var year = currentDate.getFullYear();
var month = String(currentDate.getMonth() + 1).padStart(2, '0'); 
var day = String(currentDate.getDate()).padStart(2, '0');

document.getElementById('date-added').value = `${year}-${month}-${day}`;

document.getElementById('date-added').disabled = true;





//new school year
document.addEventListener('DOMContentLoaded', function () {
    var selectedStartYear, selectedEndYear;

    function showModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    document.querySelector('#topdown1').addEventListener('change', function () {
        if (this.value === 'new-option') {
            showModal();
            this.value = 'school-year'; 
        }
    });

    document.querySelector("#submitBtn").addEventListener("click", function () {
        var startYear = document.querySelector("#startDateCalendar").value;
        var endYear = document.querySelector("#endDateCalendar").value;

        if (startYear && endYear) {
            var startYearParts = startYear.split(" - ");
            selectedStartYear = startYearParts[0];

            var endYearParts = endYear.split(" - ");
            selectedEndYear = endYearParts[0];

            var schoolYear = selectedStartYear + ' - ' + selectedEndYear;
            var selectDropdown = document.getElementById("topdown1");

            var addSchoolYearOption = selectDropdown.querySelector("option[value='new-option']");
            var option = document.createElement("option");
            option.text = schoolYear;
            option.value = schoolYear; 
            selectDropdown.insertBefore(option, addSchoolYearOption);

            closeModal(); 
        }
    });

    document.querySelector(".close").addEventListener("click", closeModal);
});
