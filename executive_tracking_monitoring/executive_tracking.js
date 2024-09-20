var currentPageDataTable = 1;
var rowsPerPageDataTable = 16;

function showRowsDataTable() {
    var rows = document.querySelectorAll('#data-table tbody tr');
    var startIndex = (currentPageDataTable - 1) * rowsPerPageDataTable;
    var endIndex = startIndex + rowsPerPageDataTable;

    rows.forEach(function(row, index) {
        if (index >= startIndex && index < endIndex) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function prevPage() {
    if (currentPageDataTable > 1) {
        currentPageDataTable--;
        showRowsDataTable();
    }
}

function nextPage() {
    var rows = document.querySelectorAll('#data-table tbody tr');
    var totalRows = rows.length;
    var totalPages = Math.ceil(totalRows / rowsPerPageDataTable);
    
    if (currentPageDataTable < totalPages) {
        currentPageDataTable++;
        showRowsDataTable();
    }
}

showRowsDataTable();

// Second pagination

var currentPageReportTable = 1;
var rowsPerPageReportTable = 9; 

function showRowsReportTable() {
    var rows = document.querySelectorAll('#report-table tbody tr');
    var startIndex = (currentPageReportTable - 1) * rowsPerPageReportTable;
    var endIndex = startIndex + rowsPerPageReportTable;

    rows.forEach(function(row, index) {
        if (index >= startIndex && index < endIndex) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function prevPageReportTable() {
    if (currentPageReportTable > 1) {
        currentPageReportTable--;
        showRowsReportTable();
    }
}

function nextPageReportTable() {
    var rows = document.querySelectorAll('#report-table tbody tr');
    var totalRows = rows.length;
    var totalPages = Math.ceil(totalRows / rowsPerPageReportTable);
    
    if (currentPageReportTable < totalPages) {
        currentPageReportTable++;
        showRowsReportTable();
    }
}

showRowsReportTable();


function nextPageReportTable() {
    var rows = document.querySelectorAll('#report-table tbody tr');
    var totalRows = rows.length;
    var totalPages = Math.ceil(totalRows / rowsPerPageReportTable);
    
    if (currentPageReportTable < totalPages) {
        currentPageReportTable++;
        showRowsReportTable();
    }
}

showRowsReportTable();


// dropdown viewing
document.getElementById("report_type").addEventListener("change", function() {
    var selectedOption = this.value; 

    if (selectedOption === "quarterly") {
        document.getElementById("quarterly_reports").style.display = "block";
        document.getElementById("report_summary").style.display = "none";
    } else if (selectedOption === "summary") {
        document.getElementById("quarterly_reports").style.display = "none";
        document.getElementById("report_summary").style.display = "block";
    }
});

//search
function filterTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.querySelector('.search-input');
    filter = input.value.toUpperCase();
    table = document.getElementById('schoolTable');
    tr = table.getElementsByTagName('tr');

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('th')[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
}


function redirectToQuarter() {
    // Get the selected value from the dropdown
    var selectedQuarter = document.getElementById("topdown").value;

    // Check if a quarter is selected
    if (selectedQuarter !== "") {
        // Construct the URL for redirection
        var redirectURL = "<?php echo $currentFileName2.'_'?>" + selectedQuarter + ".php?employment_number=<?php echo isset($_GET['employment_number']) ? $_GET['employment_number'] : 'default_value'; ?>";

        // Redirect to the selected quarter's PHP file
        window.location.href = redirectURL;
    }
}