function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.logout-icon')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

//next and prev button
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

//viewing reports
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